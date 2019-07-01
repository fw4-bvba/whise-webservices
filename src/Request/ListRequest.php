<?php

namespace Whise\Request;

abstract class ListRequest extends Request
{
    protected static function getPropertyDefinitions(): array
    {
        return array_merge(static::PROPERTIES, [
            'Page' => 'integer',
            'RowsPerPage' => 'integer'
        ]);
    }
}
