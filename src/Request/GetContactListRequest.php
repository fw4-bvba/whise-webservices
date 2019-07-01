<?php

namespace Whise\Request;

class GetContactListRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetContactList';
    const LIST = 'ContactList';

    const PROPERTIES = [
        'AcceptsEmail'            => 'boolean',
        'Address'                 => 'string',
        'AutoMariage'             => 'boolean',
        'BaseContactTypeIDList'   => ['integer'],
        'City'                    => 'string',
        'CompanyID'               => 'integer',
        'CompanyName'             => 'string',
        'ContactIDList'           => ['integer'],
        'ContactLanguageID'       => 'string',
        'ContactName'             => 'string',
        'ContactOriginIDList'     => ['integer'],
        'ContactStatusIDList'     => ['integer'],
        'ContactTitleIDList'      => ['integer'],
        'ContactTypeIDList'       => ['integer'],
        'CreateDateFrom'          => 'DateTime',
        'CreateDateTo'            => 'DateTime',
        'CreateLoginIDList'       => ['integer'],
        'Email'                   => 'string',
        'ExpirationDateFrom'      => 'DateTime',
        'ExpirationDateTo'        => 'DateTime',
        'IsExpired'               => 'boolean',
        'Language'                => 'string',
        'LocationID'              => 'integer',
        'OfficeIDList'            => ['integer'],
        'OrderByFields'           => ['string'],
        'ProspectionStatusIDList' => ['integer'],
        'RepresentativeID'        => 'integer',
        'SearchCriteria'          => 'Whise\\Request\\GetContactListRequestSearchCriteria',
        'ShowRepresentatives'     => 'boolean',
        'Sync'                    => 'boolean',
        'Tel'                     => 'string',
        'UpdateDateFrom'          => 'DateTime',
        'UpdateDateTo'            => 'DateTime',
        'UpdateLoginIDList'       => ['integer'],
        'Zip'                     => 'string',
    ];
}
