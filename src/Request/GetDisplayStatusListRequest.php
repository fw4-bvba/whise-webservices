<?php

namespace Whise\Request;

class GetDisplayStatusListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetDisplayStatusList';
    const LIST = 'DisplayStatusList';

    const PROPERTIES = [
        'Language' => 'string',
    ];
}
