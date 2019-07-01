<?php

namespace Whise\Request;

class GetRegionListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetRegionList';
    const LIST = 'RegionList';

    const PROPERTIES = [
        'Language' => 'string',
        'OfficeId' => 'integer',
    ];
}
