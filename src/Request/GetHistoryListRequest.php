<?php

namespace Whise\Request;

class GetHistoryListRequest extends ListRequest
{
    const METHOD = 'POST';
    const ENDPOINT = 'GetHistoryList';
    const LIST = 'LogEntries';

    const PROPERTIES = [
        'EndDateTime'   => 'DateTime',
        'EstateId'      => 'integer',
        'Password'      => 'string',
        'StartDateTime' => 'DateTime',
        'Type'          => 'integer',
        'UserName'      => 'string',
        'Language'      => 'string',
    ];
}
