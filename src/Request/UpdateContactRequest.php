<?php

namespace Whise\Request;

class UpdateContactRequest extends Request
{
    const METHOD = 'POST';
    const ENDPOINT = 'UpdateContact';

    const PROPERTIES = [
        'Address1'                 => 'string',
        'Address2'                 => 'string',
        'AgreementMail'            => 'boolean',
        'AgreementMailingCampaign' => 'boolean',
        'AgreementSms'             => 'boolean',
        'Box'                      => 'string',
        'City'                     => 'string',
        'Comments'                 => 'string',
        'ContactID'                => 'integer',
        'ContactOriginID'          => 'integer',
        'ContactTitleID'           => 'integer',
        'ContactType'              => 'integer',
        'ContactTypeIDList'        => ['integer'],
        'CountryID'                => 'integer',
        'EstateID'                 => 'integer',
        'FacebookLogin'            => 'string',
        'FirstName'                => 'string',
        'Gender'                   => 'integer',
        'LanguageID'               => 'string',
        'Message'                  => 'string',
        'Name'                     => 'string',
        'Number'                   => 'string',
        'OfficeID'                 => 'integer',
        'PrivateEmail'             => 'string',
        'PrivateMobile'            => 'string',
        'PrivateTel'               => 'string',
        'RepresentativeIDList'     => ['integer'],
        'SearchCriteria'           => 'Whise\\Request\\UpdateContactRequestSearchCriteria',
        'StatusID'                 => 'integer',
        'Zip'                      => 'string',
    ];
}
