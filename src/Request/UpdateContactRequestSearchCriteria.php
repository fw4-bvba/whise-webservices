<?php

namespace Whise\Request;

class UpdateContactRequestSearchCriteria extends RequestObject
{
    const PROPERTIES = [
        'AreaRange'           => ['float'],
        'Bathrooms'           => 'integer',
        'CategoryIdList'      => ['integer'],
        'CountryId'           => 'integer',
        'CustomCriteriaList'  => ['Whise\\Request\\UpdateContactRequestCustomCriteria'],
        'Floor'               => 'integer',
        'Fronts'              => 'integer',
        'Furnished'           => 'integer',
        'Garage'              => 'integer',
        'Garden'              => 'integer',
        'GardenAreaRange'     => ['float'],
        'GroundAreaRange'     => ['float'],
        'InvestmentEstate'    => 'integer',
        'MinRooms'            => 'integer',
        'Parking'             => 'integer',
        'Pool'                => 'integer',
        'PriceRange'          => ['integer'],
        'PurposeIdList'       => ['integer'],
        'PurposeStatusIdList' => ['integer'],
        'RegionIDList'        => ['integer'],
        'State'               => 'integer',
        'SubCategoryIdList'   => ['integer'],
        'Terrace'             => 'integer',
        'ZipList'             => ['string'],
    ];
}
