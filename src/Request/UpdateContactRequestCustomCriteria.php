<?php

namespace Whise\Request;

class UpdateContactRequestCustomCriteria extends RequestObject
{
    const PROPERTIES = [
        'EnumID' => 'integer',
        'NumericValue' => 'numeric',
        'SubdetailID' => 'integer',
    ];
}
