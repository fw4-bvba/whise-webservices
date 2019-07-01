<?php

namespace Whise\Response;

use Whise\Request\ListRequest;
use Whise\ApiAdapterInterface;

class AltListResponse extends ListResponse
{
    /* IteratorAggregate implementation */
    
    public function getIterator(): ListResponseIterator
    {
        return new AltListResponseIterator($this);
    }
}
