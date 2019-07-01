<?php

namespace Whise\Request;

class GetOwnedEstatesRequest extends ListRequest
{
    const METHOD = 'POST';
    const ENDPOINT = 'GetOwnedEstates';
    const LIST = 'EstateList';

    const PROPERTIES = [
        'Password' => 'string',
        'UserName' => 'string',
        'Language' => 'string',
    ];
}
