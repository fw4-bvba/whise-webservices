<?php

namespace Whise\Request;

class GetPurposeListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetPurposeList';
    const LIST = 'PurposeList';

    const PROPERTIES = [
        'Language' => 'string',
    ];
}
