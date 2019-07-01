<?php

namespace Whise\Request;

class UpdateEstateRequestPicture extends RequestObject
{
    const PROPERTIES = [
        'CreateDateTime' => 'DateTime',
        'CreateLoginId'  => 'integer',
        'Description'    => 'string',
        'DetailId'       => 'integer',
        'Is3D'           => 'boolean',
        'IsPlan'         => 'boolean',
        'OfficeId'       => 'integer',
        'Order'          => 'integer',
        'Public'         => 'boolean',
        'Size'           => 'integer',
        'UpdateDateTime' => 'DateTime',
        'UpdateLoginId'  => 'DateTime',
        'Url'            => 'string',
    ];
}
