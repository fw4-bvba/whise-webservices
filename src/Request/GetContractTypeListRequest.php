<?php

namespace Whise\Request;

class GetContractTypeListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetContractTypeList';
    const LIST = 'ContractTypeList';

    const PROPERTIES = [
        'Language' => 'string',
    ];
}
