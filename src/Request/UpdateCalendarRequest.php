<?php

namespace Whise\Request;

use Whise\DateEncoder;

class UpdateCalendarRequest extends Request
{
    const METHOD = 'POST';
    const ENDPOINT = 'UpdateCalendar';

    const PROPERTIES = [
        'AllDay'         => 'boolean',
        'CalendarId'     => 'integer',
        'ContactIdList'  => ['integer'],
        'Description1'   => 'string',
        'Description2'   => 'string',
        'EndDateTime'    => 'DateTime',
        'EstateIdList'   => ['integer'],
        'LoginId'        => 'integer',
        'OfficeId'       => 'integer',
        'Pattern'        => 'string',
        'PatternEndDate' => 'DateTime',
        'Private'        => 'boolean',
        'ShowAs'         => 'integer',
        'StartDateTime'  => 'DateTime',
        'Subject'        => 'string',
    ];
}
