<?php

namespace Whise;

use Whise\Response\{AltListResponse, ListResponse, Response, ResponseObject};

final class WebServices
{
    protected $clientId;
    protected $apiAdapter;
    protected $defaultLanguage;

    public function __construct(string $client_id, ?string $default_language = null)
    {
        $this->clientId = $client_id;
        $this->defaultLanguage = $default_language;
    }

    public function setApiAdapter(ApiAdapterInterface $api_adapter)
    {
        $default = ['ClientId' => $this->clientId];

        // Set two language parameters due to inconsistency in webservices spec
        if (!empty($this->defaultLanguage)) {
            $default['Language'] = $this->defaultLanguage;
            $default['LanguageId'] = $this->defaultLanguage;
        }

        $api_adapter->setDefaultParams($default);
        $this->apiAdapter = $api_adapter;
    }

    protected function getApiAdapter(): ApiAdapterInterface
    {
        if (empty($this->apiAdapter)) {
            $this->setApiAdapter(new HttpApiAdapter());
        }
        return $this->apiAdapter;
    }

    // General

    public function getAvailabilityList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetAvailabilityListRequest) ? $params : new Request\GetAvailabilityListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getCategoryList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetCategoryListRequest) ? $params : new Request\GetCategoryListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getContactTitleList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetContactTitleListRequest) ? $params : new Request\GetContactTitleListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getContactOriginList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetContactOriginListRequest) ? $params : new Request\GetContactOriginListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getContactTypeList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetContactTypeListRequest) ? $params : new Request\GetContactTypeListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getContractTypeList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetContractTypeListRequest) ? $params : new Request\GetContractTypeListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getCountryList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetCountryListRequest) ? $params : new Request\GetCountryListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getDetailList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetDetailListRequest) ? $params : new Request\GetDetailListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getDisplayStatusList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetDisplayStatusListRequest) ? $params : new Request\GetDisplayStatusListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getLanguageList(): ListResponse
    {
        return new ListResponse(new Request\GetLanguageListRequest(), $this->getApiAdapter());
    }

    public function getLoginList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetLoginListRequest) ? $params : new Request\GetLoginListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getOfficeList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetOfficeListRequest) ? $params : new Request\GetOfficeListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getPurposeList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetPurposeListRequest) ? $params : new Request\GetPurposeListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getRegionList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetRegionListRequest) ? $params : new Request\GetRegionListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getStateList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetStateListRequest) ? $params : new Request\GetStateListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getStatusList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetStatusListRequest) ? $params : new Request\GetStatusListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getUsedCities($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetUsedCitiesRequest) ? $params : new Request\GetUsedCitiesRequest($params);
        // GetUsedCities returns incorrect rowcount, use alternate pagination
        return new AltListResponse($request, $this->getApiAdapter());
    }

    // Estates

    public function getEstate(int $estate_id): ?ResponseObject
    {
        $list = $this->getEstateList([
            'EstateID' => $estate_id
        ]);
        return count($list) ? $list->get(0) : null;
    }

    public function getEstateList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetEstateListRequest) ? $params : new Request\GetEstateListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getHistoryList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetHistoryListRequest) ? $params : new Request\GetHistoryListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getOwnerList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetOwnerListRequest) ? $params : new Request\GetOwnerListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getOwnedEstates($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetOwnedEstatesRequest) ? $params : new Request\GetOwnedEstatesRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getContactEstates($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetContactEstatesRequest) ? $params : new Request\GetContactEstatesRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function updateEstate($params): Response
    {
        $request = ($params instanceof Request\UpdateEstateRequest) ? $params : new Request\UpdateEstateRequest($params);
        $response = $this->getApiAdapter()->request($request);
        return new Response($response);
    }

    public function updateEstateDocument($params): Response
    {
        $request = ($params instanceof Request\UpdateEstateDocumentRequest) ? $params : new Request\UpdateEstateDocumentRequest($params);
        $response = $this->getApiAdapter()->request($request);
        return new Response($response);
    }

    public function updateEstatePicture($params): Response
    {
        $request = ($params instanceof Request\UpdateEstatePictureRequest) ? $params : new Request\UpdateEstatePictureRequest($params);
        $response = $this->getApiAdapter()->request($request);
        return new Response($response);
    }

    // Contacts

    public function getContactList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetContactListRequest) ? $params : new Request\GetContactListRequest($params);
        return new ListResponse($request, $this->getApiAdapter());
    }

    public function getContact(int $contact_id): ?ResponseObject
    {
        $list = $this->getContactList([
            'ContactIDList' => [$contact_id]
        ]);
        return count($list) ? $list->get(0) : null;
    }

    public function updateContact($params = []): Response
    {
        $request = ($params instanceof Request\UpdateContactRequest) ? $params : new Request\UpdateContactRequest($params);
        $response = $this->getApiAdapter()->request($request);
        return new Response($response);
    }

    // Calendar

    public function getCalendarList($params = []): ListResponse
    {
        $request = ($params instanceof Request\GetCalendarListRequest) ? $params : new Request\GetCalendarListRequest($params);
        // GetCalendarList returns incorrect rowcount, use alternate pagination
        return new AltListResponse($request, $this->getApiAdapter());
    }

    public function updateCalendar($params = []): Response
    {
        $request = ($params instanceof Request\UpdateCalendarRequest) ? $params : new Request\UpdateCalendarRequest($params);
        $response = $this->getApiAdapter()->request($request);
        return new Response($response);
    }

    public function deleteCalendar($params = []): Response
    {
        if (is_int($params)) $params = ['CalendarId' => $params];
        $request = ($params instanceof Request\DeleteCalendarRequest) ? $params : new Request\DeleteCalendarRequest($params);
        $response = $this->getApiAdapter()->request($request);
        return new Response($response);
    }
}
