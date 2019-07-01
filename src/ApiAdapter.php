<?php

namespace Whise;

use Whise\Exception\WebServiceException;

abstract class ApiAdapter implements ApiAdapterInterface
{
    private $defaultParams = [];

    public function setDefaultParams(array $params)
    {
        $this->defaultParams = $params;
    }

    public function request(Request\Request $request): array
    {
        $json_body = json_decode($this->getBody($request), true);
        if (json_last_error() !== \JSON_ERROR_NONE) throw new WebServiceException($request::METHOD . ' to ' . $request::ENDPOINT . ' gave unexpected response: ' . $http_body);
        if (isset($json_body['ExceptionDetail']['Message'])) throw new WebServiceException($request::METHOD . ' to ' . $request::ENDPOINT . ' returned error: ' . $json_body['ExceptionDetail']['Message']);
        if (!isset($json_body['d'])) throw new WebServiceException($request::METHOD . ' to ' . $request::ENDPOINT . ' gave unexpected response: ' . $http_body);
        if (!empty($json_body['d']['Errors'])) throw new WebServiceException($request::METHOD . ' to ' . $request::ENDPOINT . ' returned error: ' . implode(', ', $json_body['d']['Errors']));
        return $json_body['d'];
    }
}
