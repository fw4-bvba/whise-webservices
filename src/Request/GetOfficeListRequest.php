<?php

namespace Whise\Request;

class GetOfficeListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetOfficeList';
    const LIST = 'OfficeList';

    const PROPERTIES = [
        'Language' => 'string',
        'OfficeIdList' => ['integer'],
    ];
}
