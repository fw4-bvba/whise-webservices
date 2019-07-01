<?php

namespace Whise\Request;

class GetCategoryListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetCategoryList';
    const LIST = 'CategoryList';

    const PROPERTIES = [
        'Language' => 'string',
    ];
}
