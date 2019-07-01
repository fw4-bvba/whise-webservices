<?php

namespace Whise\Request;

class GetContactOriginListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetContactOriginList';
    const LIST = 'ContactOriginList';

    const PROPERTIES = [
        'Language' => 'string',
        'OfficeId' => 'string',
    ];
}
