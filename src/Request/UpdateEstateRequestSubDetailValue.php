<?php

namespace Whise\Request;

class UpdateEstateRequestSubDetailValue extends RequestObject
{
    const PROPERTIES = [
        'EnumId'       => 'integer',
        'NumericValue' => 'numeric',
        'SubDetailId'  => 'integer',
        'TextValue'    => 'string',
    ];
}
