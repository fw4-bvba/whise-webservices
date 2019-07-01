<?php

namespace Whise\Request;

class UpdateEstatePictureRequest extends Request
{
    const METHOD = 'POST';
    const ENDPOINT = 'UpdateEstatePicture';

    const PROPERTIES = [
        'DescriptionMultiLanguage' => ['Whise\\Request\\UpdateEstatePictureRequestDescription'],
        'DetailId'                 => 'integer',
        'EstateId'                 => 'integer',
        'Is3D'                     => 'boolean',
        'IsPlan'                   => 'boolean',
        'IsPublic'                 => 'boolean',
        'Order'                    => 'integer',
        'PictureFile'              => 'string',
        'PictureName'              => 'string',
        'StoreOriginal'            => 'boolean',
    ];
}
