<?php

namespace Whise\Request;

class DeleteCalendarRequest extends Request
{
    const METHOD = 'POST';
    const ENDPOINT = 'DeleteCalendar';

    const PROPERTIES = [
        'CalendarId' => 'integer',
        'LoginId' => 'integer',
    ];
}
