<?php

namespace Whise\Request;

class GetAvailabilityListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetAvailabilityList';
    const LIST = 'AvailabilityList';

    const PROPERTIES = [
        'Language' => 'string',
    ];
}
