<?php

namespace Whise\Request;

class GetUsedCitiesRequest extends ListRequest
{
    const METHOD = 'GET';
    const ENDPOINT = 'GetUsedCities';
    const LIST = 'Cities';

    const PROPERTIES = [
        'Address'                  => 'string',
        'AreaRange'                => ['numeric'],
        'AvailabilityDateTime'     => 'DateTime',
        'AvailabilityIDList'       => ['integer'],
        'BaseContactTypeIDList'    => ['integer'],
        'BathRooms'                => 'integer',
        'CanHaveChildren'          => 'boolean',
        'CategoryIDList'           => ['integer'],
        'City'                     => 'string',
        'ContactIDList'            => ['integer'],
        'CountryID'                => 'integer',
        'CreateDateTimeRange'      => ['DateTime'],
        'Description'              => 'string',
        'DisplayStatusIdList'      => ['integer'],
        'EstateID'                 => 'integer',
        'Fronts'                   => 'integer',
        'Furnished'                => 'integer',
        'Garage'                   => 'integer',
        'Garden'                   => 'integer',
        'GardenAreaRange'          => ['float'],
        'GroundAreaRange'          => ['float'],
        'IncludeChildrenArea'      => 'boolean',
        'IncludeGroupEstates'      => 'boolean',
        'InvestmentEstate'         => 'boolean',
        'IsParent'                 => 'boolean',
        'IsTopParent'              => 'boolean',
        'Language'                 => 'string',
        'MinBathRooms'             => 'integer',
        'MinRooms'                 => 'integer',
        'Name'                     => 'string',
        'OfficeIDList'             => ['integer'],
        'ParentID'                 => 'integer',
        'Parking'                  => 'integer',
        'PriceChangeDateTimeRange' => ['DateTime'],
        'PriceRange'               => ['float'],
        'PurposeIDList'            => ['integer'],
        'PurposeStatusIDList'      => ['integer'],
        'RegionIDList'             => ['integer'],
        'RemoveRowLimit'           => 'boolean',
        'RepresentativeID'         => 'integer',
        'Rooms'                    => 'integer',
        'ShowDetails'              => 'boolean',
        'ShowRepresentatives'      => 'boolean',
        'StateID'                  => 'integer',
        'StatusIDList'             => ['integer'],
        'SubCategoryIDList'        => ['integer'],
        'Terrace'                  => 'integer',
        'UpdateDateTimeRange'      => ['DateTime'],
        'ZipList'                  => ['string'],
        'ZipRange'                 => ['string'],
    ];
}
