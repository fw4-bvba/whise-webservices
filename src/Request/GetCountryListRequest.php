<?php

namespace Whise\Request;

class GetCountryListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetCountryList';
    const LIST = 'CountryList';

    const PROPERTIES = [
        'Language' => 'string',
    ];
}
