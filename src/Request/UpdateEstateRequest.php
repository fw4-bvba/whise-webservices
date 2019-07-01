<?php

namespace Whise\Request;

use Whise\DateEncoder;

class UpdateEstateRequest extends Request
{
    const METHOD = 'POST';
    const ENDPOINT = 'UpdateEstate';

    const PROPERTIES = [
        'Address1'             => 'string',
        'Address2'             => 'string',
        'Area'                 => 'float',
        'AvailabilityDateTime' => 'DateTime',
        'AvailabilityId'       => 'integer',
        'BathRooms'            => 'integer',
        'Box'                  => 'string',
        'CanHaveChildren'      => 'boolean',
        'City'                 => 'string',
        'Comments'             => 'string',
        'CountryId'            => 'integer',
        'CreateDateTime'       => 'DateTime',
        'CreateLoginId'        => 'integer',
        'DisplayAddress'       => 'boolean',
        'DisplayPrice'         => 'boolean',
        'DisplayStatusId'      => 'integer',
        'EstateId'             => 'integer',
        'EstateOrder'          => 'integer',
        'Evaluation'           => 'integer',
        'Floor'                => 'string',
        'Fronts'               => 'integer',
        'Furnished'            => 'integer',
        'Garage'               => 'integer',
        'Garden'               => 'integer',
        'GardenArea'           => 'float',
        'GroundArea'           => 'float',
        'InvestmentEstate'     => 'boolean',
        'IsTypeEstate'         => 'boolean',
        'LanguageId'           => 'string',
        'Link3DModel'          => 'string',
        'LinkRouteDesc'        => 'boolean',
        'LinkVirtualVisit'     => 'string',
        'LongDescription'      => 'string',
        'Name'                 => 'string',
        'Number'               => 'string',
        'OfficeId'             => 'integer',
        'ParentId'             => 'integer',
        'Parking'              => 'integer',
        'Pictures'             => ['Whise\\Request\\UpdateEstateRequestPicture'],
        'Price'                => 'float',
        'PriceChangeDateTime'  => 'DateTime',
        'PublicationText'      => 'string',
        'PurposeStatusId'      => 'integer',
        'ReferenceNumber'      => 'string',
        'RegionIdList'         => ['integer'],
        'RepresentativeId'     => 'integer',
        'RepresentativeIdList' => ['integer'],
        'Rooms'                => 'integer',
        'ShortDescription'     => 'string',
        'Sms'                  => 'string',
        'StateId'              => 'integer',
        'StatusId'             => 'integer',
        'SubCategoryId'        => 'integer',
        'SubDetailValues'      => ['Whise\\Request\\UpdateEstateRequestSubDetailValue'],
        'Terrace'              => 'integer',
        'UpdateDateTime'       => 'DateTime',
        'UpdateLoginId'        => 'integer',
        'Zip'                  => 'string',
    ];

    public function addSubDetailEnum(int $sub_detail_id, ?int $enum_id)
    {
        $this->add('SubDetailValues', [
            'SubDetailId' => $sub_detail_id,
            'EnumId' => $enum_id
        ], 'SubDetailId');
    }

    public function addSubDetailNumber(int $sub_detail_id, $number)
    {
        $this->add('SubDetailValues', [
            'SubDetailId' => $sub_detail_id,
            'NumericValue' => $number
        ], 'SubDetailId');
    }

    public function addSubDetailString(int $sub_detail_id, $string)
    {
        $this->add('SubDetailValues', [
            'SubDetailId' => $sub_detail_id,
            'TextValue' => is_null($string) ? null : strval($string)
        ], 'SubDetailId');
    }

    public function addSubDetailDate(int $sub_detail_id, ?\DateTime $date)
    {
        $this->add('SubDetailValues', [
            'SubDetailId' => $sub_detail_id,
            'TextValue' => is_null($date) ? null : DateEncoder::encode($date)
        ], 'SubDetailId');
    }
}
