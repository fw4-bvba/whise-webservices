<?php

namespace Whise\Request;

class GetOwnerListRequest extends ListRequest
{
    const METHOD = 'POST';
    const ENDPOINT = 'GetOwnerList';
    const LIST = 'Owners';

    const PROPERTIES = [
        'EstateId' => 'integer',
        'Password' => 'string',
        'UserName' => 'string',
        'Language' => 'string',
    ];
}
