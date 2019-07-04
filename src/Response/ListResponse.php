<?php

namespace Whise\Response;

use Whise\Request\ListRequest;
use Whise\ApiAdapterInterface;

class ListResponse implements \Countable, \IteratorAggregate
{
    const DEFAULT_ROWS_PER_PAGE = 30;

    protected $buffer;

    public function __construct(ListRequest $request, ApiAdapterInterface $api_adapter, int $per_page = self::DEFAULT_ROWS_PER_PAGE)
    {
        $this->buffer = new ListResponseBuffer(clone $request, $api_adapter, $per_page);
    }

    public function get(int $position)
    {
        return $this->buffer->get($position);
    }

    public function getPage(): int
    {
        return $this->buffer->getPage();
    }

    public function getRowsPerPage(): int
    {
        return $this->buffer->getRowsPerPage();
    }

    public function __debugInfo(): array
    {
        return [
            'rowCount' => $this->count()
        ];
    }

    /* Countable implementation */

    public function count(): int
    {
        return $this->buffer->getTotalRowCount();
    }

    /* IteratorAggregate implementation */

    public function getIterator(): ListResponseIterator
    {
        return new ListResponseIterator($this);
    }
}
