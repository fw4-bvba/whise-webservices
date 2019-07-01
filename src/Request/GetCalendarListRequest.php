<?php

namespace Whise\Request;

class GetCalendarListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetCalendarList';
    const LIST = 'CalendarList';

    const PROPERTIES = [
        'LanguageId'     => 'string',
        'StartDateTime'  => 'DateTime',
        'EndDateTime'    => 'DateTime',
        'UpdateDateFrom' => 'DateTime',
        'UpdateDateTo'   => 'DateTime',
        'LoginId'        => 'integer',
    ];
}
