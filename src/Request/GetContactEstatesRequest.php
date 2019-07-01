<?php

namespace Whise\Request;

class GetContactEstatesRequest extends ListRequest
{
    const METHOD = 'POST';
    const ENDPOINT = 'GetContactEstates';
    const LIST = 'EstateList';

    const PROPERTIES = [
        'Password' => 'string',
        'UserName' => 'string',
        'Language' => 'string',
    ];
}
