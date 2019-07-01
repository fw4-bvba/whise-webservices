<?php

namespace Whise\Request;

class GetStateListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetStateList';
    const LIST = 'StateList';

    const PROPERTIES = [
        'Language' => 'string',
    ];
}
