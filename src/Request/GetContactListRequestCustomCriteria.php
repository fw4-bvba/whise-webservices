<?php

namespace Whise\Request;

class GetContactListRequestCustomCriteria extends RequestObject
{
    const PROPERTIES = [
        'EnumID' => 'integer',
        'NumericValue' => 'numeric',
        'SubdetailID' => 'integer',
    ];
}
