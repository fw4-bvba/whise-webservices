<?php

namespace Whise\Request;

class GetStatusListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetStatusList';
    const LIST = 'StatusList';

    const PROPERTIES = [
        'Language' => 'string',
    ];
}
