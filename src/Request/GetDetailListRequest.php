<?php

namespace Whise\Request;

class GetDetailListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetDetailList';
    const LIST = 'DetailList';

    const PROPERTIES = [
        'Language' => 'string',
    ];
}
