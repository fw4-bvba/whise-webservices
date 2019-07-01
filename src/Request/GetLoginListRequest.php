<?php

namespace Whise\Request;

class GetLoginListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetLoginList';
    const LIST = 'LoginList';

    const PROPERTIES = [
        'Language' => 'string',
        'OfficeId' => 'integer',
    ];
}
