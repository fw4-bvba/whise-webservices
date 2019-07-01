<?php

namespace Whise\Request;

class GetContactListRequestSearchCriteria extends RequestObject
{
    const PROPERTIES = [
        'AreaMax'           => 'integer',
        'AreaMin'           => 'integer',
        'Bathrooms'         => 'integer',
        'CategoryIdList'    => ['integer'],
        'CountryId'         => 'integer',
        'CustomCriteria'    => ['Whise\\Request\\GetContactListRequestCustomCriteria'],
        'Floor'             => 'boolean',
        'Fronts'            => 'integer',
        'Furnished'         => 'boolean',
        'Garage'            => 'boolean',
        'Garden'            => 'boolean',
        'GardenAreaMax'     => 'integer',
        'GardenAreaMin'     => 'integer',
        'GroundAreaMax'     => 'integer',
        'GroundAreaMin'     => 'integer',
        'InvestmentEstate'  => 'boolean',
        'Parking'           => 'boolean',
        'Pool'              => 'boolean',
        'PriceMax'          => 'numeric',
        'PriceMin'          => 'numeric',
        'PurposeIdList'     => ['integer'],
        'RegionIDList'      => ['integer'],
        'Rooms'             => 'integer',
        'StateID'           => 'integer',
        'SubCategoryIdList' => ['integer'],
        'Terrace'           => 'boolean',
        'ZipCodeList'       => ['string'],
    ];
}
