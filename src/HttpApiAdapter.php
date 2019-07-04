<?php

namespace Whise;

use Whise\Exception\WebServiceException;

final class HttpApiAdapter extends ApiAdapter
{
    const ROOT = 'https://sbs.whise.eu/websiteservices/EstateService.svc/';

    private $httpClient;
    private $defaultParams = [];
    public $requestOptions = [];

    public function __construct()
    {
        $version = \PackageVersions\Versions::getVersion('fw4/whise-webservices');

        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => self::ROOT,
            'http_errors' => false,
            'headers' => [
                'User-Agent' => 'fw4-whise-webservices/' . $version,
                'Accept'     => 'application/json',
            ]
        ]);
    }

    public function getBody(Request\Request $request): string
    {
        $options = [];
        $parameters = array_merge($this->defaultParams, $request->jsonSerialize());
        if ($request::METHOD === 'GET') {
            $options['query'] = ['estateService' . $request::ENDPOINT . 'Request' => json_encode($parameters)];
        } else {
            $options['json'] = ['estateService' . $request::ENDPOINT . 'Request' => $parameters];
        }

        $http_request = new \GuzzleHttp\Psr7\Request($request::METHOD, $request::ENDPOINT);
        $http_response = $this->httpClient->send($http_request, array_merge($this->requestOptions, $options));
        return $http_response->getBody()->getContents();
    }

    public function setDefaultParams(array $params)
    {
        $this->defaultParams = array_merge($this->defaultParams, $params);
    }
}
