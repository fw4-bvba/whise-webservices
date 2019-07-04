<?php

namespace Whise\Response;

use Whise\Exception\WebServiceException;
use Whise\Request\ListRequest;
use Whise\ApiAdapterInterface;

final class ListResponseBuffer
{
    protected $request;
    protected $apiAdapter;
    protected $buffer;
    protected $rowCount;

    public function __construct(ListRequest $request, ApiAdapterInterface $api_adapter, int $per_page = 25)
    {
        if ($per_page) $request->rowsPerPage = $per_page;

        $this->request = $request;
        $this->apiAdapter = $api_adapter;

        $this->bufferPage(0);
    }

    public function getTotalRowCount(): int
    {
        return $this->rowCount;
    }

    public function get(int $position)
    {
        if ($this->request->rowsPerPage) {
            if (!$this->isBuffered($position)) {
                $this->bufferPage(floor($position / $this->request->rowsPerPage));
            }
            return $this->buffer[$position % $this->request->rowsPerPage] ?? null;
        } else {
            return $this->buffer[$position] ?? null;
        }
    }

    protected function bufferPage(int $page)
    {
        if ($this->request->page === $page) return;
        $this->request->page = $page;

        $response = $this->apiAdapter->request($this->request);
        if (!empty($response['QueryInfo']['Error'])) {
            throw new WebServiceException('Error calling ' . $this->request::ENDPOINT . ': ' . $response['QueryInfo']['Error']);
        }
        if ((!isset($response['QueryInfo']['RowCount']) && !isset($response['rowCount'])) || !isset($response[$this->request::LIST])) {
            throw new WebServiceException($this->request::ENDPOINT . ' gave unexpected response: ' . json_encode($response));
        }

        $this->buffer = [];
        $this->current = 0;
        foreach ($response[$this->request::LIST] as $index => $row) {
            if (is_array($row)) $this->buffer[] = ResponseObject::create($row);
            else $this->buffer[] = $row;
        }
        if (is_null($this->rowCount)) $this->rowCount = $response['rowCount'] ?? $response['QueryInfo']['RowCount'] ?? 0;
        // Correct erroneous rowCounts returned from Whise
        if (!empty($this->buffer)) $this->rowCount = max($this->rowCount, $page * $this->request->rowsPerPage + count($this->buffer));
    }

    protected function isBuffered(int $position): bool
    {
        $first_position = $this->request->rowsPerPage * $this->request->page;
        return ($position >= $first_position && $position < $first_position + count($this->buffer));
    }

    public function getPage(): int
    {
        return $this->request->page;
    }

    public function getRowsPerPage(): int
    {
        return $this->request->rowsPerPage;
    }
}
