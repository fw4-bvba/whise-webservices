<?php

namespace Whise\Request;

class GetContactTitleListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetContactTitleList';
    const LIST = 'ContactTitleList';

    const PROPERTIES = [
        'Language' => 'string',
        'Refresh'  => 'boolean',
    ];
}
