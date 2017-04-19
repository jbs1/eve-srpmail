<?php
/**
 * MarketApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * EVE Swagger Interface
 *
 * An OpenAPI for EVE Online
 *
 * OpenAPI spec version: 0.4.2
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use \Swagger\Client\ApiClient;
use \Swagger\Client\ApiException;
use \Swagger\Client\Configuration;
use \Swagger\Client\ObjectSerializer;

/**
 * MarketApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class MarketApi
{
    /**
     * API Client
     *
     * @var \Swagger\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Swagger\Client\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Swagger\Client\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Swagger\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Swagger\Client\ApiClient $apiClient set the API client
     *
     * @return MarketApi
     */
    public function setApiClient(\Swagger\Client\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation getMarketsGroups
     *
     * Get item groups
     *
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return int[]
     */
    public function getMarketsGroups($datasource = null, $user_agent = null, $x_user_agent = null)
    {
        list($response) = $this->getMarketsGroupsWithHttpInfo($datasource, $user_agent, $x_user_agent);
        return $response;
    }

    /**
     * Operation getMarketsGroupsWithHttpInfo
     *
     * Get item groups
     *
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of int[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getMarketsGroupsWithHttpInfo($datasource = null, $user_agent = null, $x_user_agent = null)
    {
        // parse inputs
        $resourcePath = "/markets/groups/";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($datasource !== null) {
            $queryParams['datasource'] = $this->apiClient->getSerializer()->toQueryValue($datasource);
        }
        // query params
        if ($user_agent !== null) {
            $queryParams['user_agent'] = $this->apiClient->getSerializer()->toQueryValue($user_agent);
        }
        // header params
        if ($x_user_agent !== null) {
            $headerParams['X-User-Agent'] = $this->apiClient->getSerializer()->toHeaderValue($x_user_agent);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                'int[]',
                '/markets/groups/'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, 'int[]', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), 'int[]', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsGroupsInternalServerError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getMarketsGroupsMarketGroupId
     *
     * Get item group information
     *
     * @param int $market_group_id An Eve item group ID (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $language Language to use in the response (optional, default to en-us)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\GetMarketsGroupsMarketGroupIdOk
     */
    public function getMarketsGroupsMarketGroupId($market_group_id, $datasource = null, $language = null, $user_agent = null, $x_user_agent = null)
    {
        list($response) = $this->getMarketsGroupsMarketGroupIdWithHttpInfo($market_group_id, $datasource, $language, $user_agent, $x_user_agent);
        return $response;
    }

    /**
     * Operation getMarketsGroupsMarketGroupIdWithHttpInfo
     *
     * Get item group information
     *
     * @param int $market_group_id An Eve item group ID (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $language Language to use in the response (optional, default to en-us)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\GetMarketsGroupsMarketGroupIdOk, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMarketsGroupsMarketGroupIdWithHttpInfo($market_group_id, $datasource = null, $language = null, $user_agent = null, $x_user_agent = null)
    {
        // verify the required parameter 'market_group_id' is set
        if ($market_group_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $market_group_id when calling getMarketsGroupsMarketGroupId');
        }
        // parse inputs
        $resourcePath = "/markets/groups/{market_group_id}/";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($datasource !== null) {
            $queryParams['datasource'] = $this->apiClient->getSerializer()->toQueryValue($datasource);
        }
        // query params
        if ($language !== null) {
            $queryParams['language'] = $this->apiClient->getSerializer()->toQueryValue($language);
        }
        // query params
        if ($user_agent !== null) {
            $queryParams['user_agent'] = $this->apiClient->getSerializer()->toQueryValue($user_agent);
        }
        // header params
        if ($x_user_agent !== null) {
            $headerParams['X-User-Agent'] = $this->apiClient->getSerializer()->toHeaderValue($x_user_agent);
        }
        // path params
        if ($market_group_id !== null) {
            $resourcePath = str_replace(
                "{" . "market_group_id" . "}",
                $this->apiClient->getSerializer()->toPathValue($market_group_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\GetMarketsGroupsMarketGroupIdOk',
                '/markets/groups/{market_group_id}/'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\GetMarketsGroupsMarketGroupIdOk', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsGroupsMarketGroupIdOk', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsGroupsMarketGroupIdNotFound', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsGroupsMarketGroupIdInternalServerError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getMarketsPrices
     *
     * List market prices
     *
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\GetMarketsPrices200Ok[]
     */
    public function getMarketsPrices($datasource = null, $user_agent = null, $x_user_agent = null)
    {
        list($response) = $this->getMarketsPricesWithHttpInfo($datasource, $user_agent, $x_user_agent);
        return $response;
    }

    /**
     * Operation getMarketsPricesWithHttpInfo
     *
     * List market prices
     *
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\GetMarketsPrices200Ok[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getMarketsPricesWithHttpInfo($datasource = null, $user_agent = null, $x_user_agent = null)
    {
        // parse inputs
        $resourcePath = "/markets/prices/";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($datasource !== null) {
            $queryParams['datasource'] = $this->apiClient->getSerializer()->toQueryValue($datasource);
        }
        // query params
        if ($user_agent !== null) {
            $queryParams['user_agent'] = $this->apiClient->getSerializer()->toQueryValue($user_agent);
        }
        // header params
        if ($x_user_agent !== null) {
            $headerParams['X-User-Agent'] = $this->apiClient->getSerializer()->toHeaderValue($x_user_agent);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\GetMarketsPrices200Ok[]',
                '/markets/prices/'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\GetMarketsPrices200Ok[]', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsPrices200Ok[]', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsPricesInternalServerError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getMarketsRegionIdHistory
     *
     * List historical market statistics in a region
     *
     * @param int $region_id Return statistics in this region (required)
     * @param int $type_id Return statistics for this type (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\GetMarketsRegionIdHistory200Ok[]
     */
    public function getMarketsRegionIdHistory($region_id, $type_id, $datasource = null, $user_agent = null, $x_user_agent = null)
    {
        list($response) = $this->getMarketsRegionIdHistoryWithHttpInfo($region_id, $type_id, $datasource, $user_agent, $x_user_agent);
        return $response;
    }

    /**
     * Operation getMarketsRegionIdHistoryWithHttpInfo
     *
     * List historical market statistics in a region
     *
     * @param int $region_id Return statistics in this region (required)
     * @param int $type_id Return statistics for this type (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\GetMarketsRegionIdHistory200Ok[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getMarketsRegionIdHistoryWithHttpInfo($region_id, $type_id, $datasource = null, $user_agent = null, $x_user_agent = null)
    {
        // verify the required parameter 'region_id' is set
        if ($region_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $region_id when calling getMarketsRegionIdHistory');
        }
        // verify the required parameter 'type_id' is set
        if ($type_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $type_id when calling getMarketsRegionIdHistory');
        }
        // parse inputs
        $resourcePath = "/markets/{region_id}/history/";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($datasource !== null) {
            $queryParams['datasource'] = $this->apiClient->getSerializer()->toQueryValue($datasource);
        }
        // query params
        if ($type_id !== null) {
            $queryParams['type_id'] = $this->apiClient->getSerializer()->toQueryValue($type_id);
        }
        // query params
        if ($user_agent !== null) {
            $queryParams['user_agent'] = $this->apiClient->getSerializer()->toQueryValue($user_agent);
        }
        // header params
        if ($x_user_agent !== null) {
            $headerParams['X-User-Agent'] = $this->apiClient->getSerializer()->toHeaderValue($x_user_agent);
        }
        // path params
        if ($region_id !== null) {
            $resourcePath = str_replace(
                "{" . "region_id" . "}",
                $this->apiClient->getSerializer()->toPathValue($region_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\GetMarketsRegionIdHistory200Ok[]',
                '/markets/{region_id}/history/'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\GetMarketsRegionIdHistory200Ok[]', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsRegionIdHistory200Ok[]', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsRegionIdHistoryUnprocessableEntity', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsRegionIdHistoryInternalServerError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getMarketsRegionIdOrders
     *
     * List orders in a region
     *
     * @param string $order_type Filter buy/sell orders, return all orders by default. If you query without type_id, we always return both buy and sell orders. (required)
     * @param int $region_id Return orders in this region (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param int $page Which page to query, only used for querying without type_id. Starting at 1 (optional, default to 1)
     * @param int $type_id Return orders only for this type (optional)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\GetMarketsRegionIdOrders200Ok[]
     */
    public function getMarketsRegionIdOrders($order_type, $region_id, $datasource = null, $page = null, $type_id = null, $user_agent = null, $x_user_agent = null)
    {
        list($response) = $this->getMarketsRegionIdOrdersWithHttpInfo($order_type, $region_id, $datasource, $page, $type_id, $user_agent, $x_user_agent);
        return $response;
    }

    /**
     * Operation getMarketsRegionIdOrdersWithHttpInfo
     *
     * List orders in a region
     *
     * @param string $order_type Filter buy/sell orders, return all orders by default. If you query without type_id, we always return both buy and sell orders. (required)
     * @param int $region_id Return orders in this region (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param int $page Which page to query, only used for querying without type_id. Starting at 1 (optional, default to 1)
     * @param int $type_id Return orders only for this type (optional)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\GetMarketsRegionIdOrders200Ok[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getMarketsRegionIdOrdersWithHttpInfo($order_type, $region_id, $datasource = null, $page = null, $type_id = null, $user_agent = null, $x_user_agent = null)
    {
        // verify the required parameter 'order_type' is set
        if ($order_type === null) {
            throw new \InvalidArgumentException('Missing the required parameter $order_type when calling getMarketsRegionIdOrders');
        }
        // verify the required parameter 'region_id' is set
        if ($region_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $region_id when calling getMarketsRegionIdOrders');
        }
        // parse inputs
        $resourcePath = "/markets/{region_id}/orders/";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($datasource !== null) {
            $queryParams['datasource'] = $this->apiClient->getSerializer()->toQueryValue($datasource);
        }
        // query params
        if ($order_type !== null) {
            $queryParams['order_type'] = $this->apiClient->getSerializer()->toQueryValue($order_type);
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = $this->apiClient->getSerializer()->toQueryValue($page);
        }
        // query params
        if ($type_id !== null) {
            $queryParams['type_id'] = $this->apiClient->getSerializer()->toQueryValue($type_id);
        }
        // query params
        if ($user_agent !== null) {
            $queryParams['user_agent'] = $this->apiClient->getSerializer()->toQueryValue($user_agent);
        }
        // header params
        if ($x_user_agent !== null) {
            $headerParams['X-User-Agent'] = $this->apiClient->getSerializer()->toHeaderValue($x_user_agent);
        }
        // path params
        if ($region_id !== null) {
            $resourcePath = str_replace(
                "{" . "region_id" . "}",
                $this->apiClient->getSerializer()->toPathValue($region_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\GetMarketsRegionIdOrders200Ok[]',
                '/markets/{region_id}/orders/'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\GetMarketsRegionIdOrders200Ok[]', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsRegionIdOrders200Ok[]', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsRegionIdOrdersUnprocessableEntity', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsRegionIdOrdersInternalServerError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getMarketsStructuresStructureId
     *
     * List orders in a structure
     *
     * @param int $structure_id Return orders in this structure (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param int $page Which page to query, starting at 1 (optional, default to 1)
     * @param string $token Access token to use, if preferred over a header (optional)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\GetMarketsStructuresStructureId200Ok[]
     */
    public function getMarketsStructuresStructureId($structure_id, $datasource = null, $page = null, $token = null, $user_agent = null, $x_user_agent = null)
    {
        list($response) = $this->getMarketsStructuresStructureIdWithHttpInfo($structure_id, $datasource, $page, $token, $user_agent, $x_user_agent);
        return $response;
    }

    /**
     * Operation getMarketsStructuresStructureIdWithHttpInfo
     *
     * List orders in a structure
     *
     * @param int $structure_id Return orders in this structure (required)
     * @param string $datasource The server name you would like data from (optional, default to tranquility)
     * @param int $page Which page to query, starting at 1 (optional, default to 1)
     * @param string $token Access token to use, if preferred over a header (optional)
     * @param string $user_agent Client identifier, takes precedence over headers (optional)
     * @param string $x_user_agent Client identifier, takes precedence over User-Agent (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\GetMarketsStructuresStructureId200Ok[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getMarketsStructuresStructureIdWithHttpInfo($structure_id, $datasource = null, $page = null, $token = null, $user_agent = null, $x_user_agent = null)
    {
        // verify the required parameter 'structure_id' is set
        if ($structure_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $structure_id when calling getMarketsStructuresStructureId');
        }
        // parse inputs
        $resourcePath = "/markets/structures/{structure_id}/";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($datasource !== null) {
            $queryParams['datasource'] = $this->apiClient->getSerializer()->toQueryValue($datasource);
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = $this->apiClient->getSerializer()->toQueryValue($page);
        }
        // query params
        if ($token !== null) {
            $queryParams['token'] = $this->apiClient->getSerializer()->toQueryValue($token);
        }
        // query params
        if ($user_agent !== null) {
            $queryParams['user_agent'] = $this->apiClient->getSerializer()->toQueryValue($user_agent);
        }
        // header params
        if ($x_user_agent !== null) {
            $headerParams['X-User-Agent'] = $this->apiClient->getSerializer()->toHeaderValue($x_user_agent);
        }
        // path params
        if ($structure_id !== null) {
            $resourcePath = str_replace(
                "{" . "structure_id" . "}",
                $this->apiClient->getSerializer()->toPathValue($structure_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires OAuth (access token)
        if (strlen($this->apiClient->getConfig()->getAccessToken()) !== 0) {
            $headerParams['Authorization'] = 'Bearer ' . $this->apiClient->getConfig()->getAccessToken();
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\GetMarketsStructuresStructureId200Ok[]',
                '/markets/structures/{structure_id}/'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\GetMarketsStructuresStructureId200Ok[]', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsStructuresStructureId200Ok[]', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsStructuresStructureIdForbidden', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GetMarketsStructuresStructureIdInternalServerError', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}