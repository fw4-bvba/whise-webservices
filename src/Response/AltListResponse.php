<?php

namespace Whise\Response;

use Whise\Request\ListRequest;
use Whise\ApiAdapterInterface;

class AltListResponse extends ListResponse
{
    public function __construct(ListRequest $request, ApiAdapterInterface $api_adapter, int $per_page = self::DEFAULT_ROWS_PER_PAGE)
    {
        $this->buffer = new AltListResponseBuffer(clone $request, $api_adapter, $per_page);
    }

    /* IteratorAggregate implementation */

    public function getIterator(): ListResponseIterator
    {
        return new AltListResponseIterator($this);
    }
}
