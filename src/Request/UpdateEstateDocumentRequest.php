<?php

namespace Whise\Request;

class UpdateEstateDocumentRequest extends Request
{
    const METHOD = 'POST';
    const ENDPOINT = 'UpdateEstateDocument';

    const PROPERTIES = [
        'Description'      => 'string',
        'DocumentFile'     => 'string',
        'DocumentFileSize' => 'string',
        'EstateId'         => 'integer',
        'FileName'         => 'string',
        'IsPublic'         => 'boolean',
        'Language'         => 'string',
    ];
}
