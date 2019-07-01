<?php

namespace Whise\Request;

class GetContactTypeListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetContactTypeList';
    const LIST = 'BaseContactTypeList';

    const PROPERTIES = [
        'Language' => 'string',
        'OfficeId'  => 'integer',
    ];
}
