<?php

namespace ExpertSender;

use SimpleXMLElement;
use ExpertSender\Statics\Endpoint;
use ExpertSender\Packages\XMLSerializer;
use ExpertSender\Abstracts\IExpertSender;
use ExpertSender\Requests\Unit\GetListsRequest;
use ExpertSender\Requests\Event\AddEventRequest;
use ExpertSender\Packages\HttpClient\IHttpClient;
use ExpertSender\Requests\DataTable\AddDataTableRequest;
use ExpertSender\Validators\Abstracts\IGetListsValidator;
use ExpertSender\Validators\Abstracts\IAddEventValidator;
use ExpertSender\Requests\Subscriber\GetSubscriberRequest;
use ExpertSender\Requests\DataTable\DeleteDataTableRequest;
use ExpertSender\Requests\DataTable\SearchDataTableRequest;
use ExpertSender\Requests\DataTable\AddMultiDataTableRequest;
use ExpertSender\Validators\Abstracts\IAddDataTableValidator;
use ExpertSender\Requests\Subscriber\DeleteSubscriberRequest;
use ExpertSender\Validators\Abstracts\IMultiDataTableValidator;
use ExpertSender\Validators\Abstracts\IDeleteDataTableValidator;
use ExpertSender\Validators\Abstracts\ISearchDataTableValidator;
use ExpertSender\Validators\Abstracts\IDeleteSubscriberValidator;
use ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest;
use ExpertSender\Validators\Abstracts\IGetSubscriberListsValidator;
use ExpertSender\Validators\Abstracts\IAddAndUpdateSubscriberValidator;

class ExpertSender extends BaseExpertSender implements IExpertSender
{
    /**
     * @var \ExpertSender\Packages\HttpClient\IHttpClient
     */
    private $httpClient;

    /**
     * @var \ExpertSender\Validators\IAddEventValidator
     */
    private $addEventValidator;

    /**
     * @var \ExpertSender\Validators\IAddAndUpdateSubscriberValidator
     */
    private $addAndUpdateSubscriberValidator;

    /**
     * @var \ExpertSender\Validators\IGetSubscriberListsValidator
     */
    private $getSubscriberListsValidator;

    /**
     * @var \ExpertSender\Validators\IAddDataTableValidator
     */
    private $addDataTableValidator;

    /**  
     * @var \ExpertSender\Validators\IMultiDataTableValidator
     */
    private $multiDataTableValidator;

    /**
     * @var \ExpertSender\Validators\IDeleteDataTableValidator
     */
    private $deleteDataTableValidator;

    /**
     * @var \ExpertSender\Validators\ISearchDataTableValidator
     */
    private $searchDataTableValidator;

    /**
     * @var \ExpertSender\Validators\IDeleteSubscriberValidator
     */
    private $deleteSubscriberValidator;

    /**
     * @var \ExpertSender\Validators\IGetListsValidator
     */
    private $getListsValidator;

    /**
     * Creates new object instance.
     */
    public function __construct(
        IHttpClient $httpClient,
        IAddEventValidator $addEventValidator,
        IAddAndUpdateSubscriberValidator $addAndUpdateSubscriberValidator,
        IGetSubscriberListsValidator $getSubscriberListsValidator,
        IAddDataTableValidator $addDataTableValidator,
        IDeleteDataTableValidator $deleteDataTableValidator,
        ISearchDataTableValidator $searchDataTableValidator,
        IDeleteSubscriberValidator $deleteSubscriberValidator,
        IGetListsValidator $getListsValidator,
        IMultiDataTableValidator $multiDataTableValidator
    ) {
        parent::__construct();
        $this->httpClient = $httpClient;
        $this->addEventValidator = $addEventValidator;
        $this->addAndUpdateSubscriberValidator = $addAndUpdateSubscriberValidator;
        $this->getSubscriberListsValidator = $getSubscriberListsValidator;
        $this->addDataTableValidator = $addDataTableValidator;
        $this->deleteDataTableValidator = $deleteDataTableValidator;
        $this->searchDataTableValidator = $searchDataTableValidator;
        $this->deleteSubscriberValidator = $deleteSubscriberValidator;
        $this->getListsValidator = $getListsValidator;
        $this->multiDataTableValidator = $multiDataTableValidator;
        $this->httpClient->setBaseUrl($this->getApiUrl());
    }

    /**
     * Get business unit lists.
     *
     * @param \ExpertSender\Requests\List\GetListsRequest
     * @return SimpleXMLElement
     */
    public function getBusinessUnitLists(GetListsRequest $request): SimpleXMLElement
    {
        $this->getListsValidator->validate($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendGet(Endpoint::$lists . '?' . http_build_query($request), [], null);
        });

        return simplexml_load_string($response->getBody());
    }

    /**
     * Get subscriber lists in bussiness unit.
     *
     * @param \ExpertSender\Requests\Subscriber\GetSubscriberRequest
     * @return SimpleXMLElement
     */
    public function getSubscriberLists(GetSubscriberRequest $request): SimpleXMLElement
    {
        $this->getSubscriberListsValidator->validate($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendGet(Endpoint::$subscribers . '?' . http_build_query($request), [], null);
        });

        return simplexml_load_string($response->getBody());
    }

    /**
     * Create ExpertSender subscriber on list in business unit.
     *
     * @param \ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest
     * @return bool
     */
    public function addAndUpdateSubscriber(AddAndUpdateSubscriberRequest $request): bool
    {
        $this->addAndUpdateSubscriberValidator->validate($request);

        $request = XMLSerializer::generateValidXmlFromObject($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendPost(Endpoint::$subscribers, [], $request);
        });

        if ($response->getHttpResponseCode() && $response->getHttpResponseCode() < 299) {
            return true;
        }

        return false;
    }

    /**
     * Get subscriber lists in bussiness unit.
     *
     * @param \ExpertSender\Requests\Subscriber\DeleteSubscriberRequest
     * @return bool
     */
    public function deleteSubscriber(DeleteSubscriberRequest $request): bool
    {
        $this->deleteSubscriberValidator->validate($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendDelete(Endpoint::$subscribers . '?' . http_build_query($request), [], null);
        });

        if ($response->getHttpResponseCode() && $response->getHttpResponseCode() < 299) {
            return true;
        }

        return false;
    }

    /**
     * Create ExpertSender event.
     *
     * @param \ExpertSender\Requests\Event\AddEventRequest
     * @return bool
     */
    public function addEvent(AddEventRequest $request): bool
    {
        $this->addEventValidator->validate($request);

        $request = XMLSerializer::generateValidXmlFromObject($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendPost(Endpoint::$workflowCustomEvents, [], $request);
        });

        if ($response->getHttpResponseCode() && $response->getHttpResponseCode() < 299) {
            return true;
        }

        return false;
    }

    /**
     * Add datatable rows.
     *
     * @param \ExpertSender\Requests\DataTable\AddDataTableRequest
     * @return bool
     */
    public function addDataTable(AddDataTableRequest $request): bool
    {
        $this->addDataTableValidator->validate($request);

        $request = XMLSerializer::generateValidXmlFromObject($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendPost(Endpoint::$dataTablesAddRow, [], $request);
        });

        if ($response->getHttpResponseCode() && $response->getHttpResponseCode() < 299) {
            return true;
        }

        return false;
    }

    /**
     * Add multi datatable rows.
     *
     * @param \ExpertSender\Requests\DataTable\AddMultiDataTableRequest
     * @return bool
     */
    public function addMultiDataTable(AddMultiDataTableRequest $request): bool
    {
        $this->multiDataTableValidator->validate($request);

        $request = XMLSerializer::generateValidXmlFromObject($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendPost(Endpoint::$dataTablesAddMultiRows, [], $request);
        });

        if ($response->getHttpResponseCode() && $response->getHttpResponseCode() < 299) {
            return true;
        }

        return false;
    }

    /**
     * Update multi datatable rows.
     *
     * @param \ExpertSender\Requests\DataTable\AddMultiDataTableRequest
     * @return bool
     */
    public function updateMultiDataTable(AddMultiDataTableRequest $request): bool
    {
        $this->multiDataTableValidator->validate($request);

        $request = XMLSerializer::generateValidXmlFromObject($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendPost(Endpoint::$dataTablesUpdateMultiRows, [], $request);
        });

        if ($response->getHttpResponseCode() && $response->getHttpResponseCode() < 299) {
            return true;
        }

        return false;
    }

    /**
     * Delete datatable rows.
     *
     * @param \ExpertSender\Requests\DataTable\DeleteDataTableRequest
     * @return bool
     */
    public function deleteDataTable(DeleteDataTableRequest $request): bool
    {
        $this->deleteDataTableValidator->validate($request);

        $request = XMLSerializer::generateValidXmlFromObject($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendPost(Endpoint::$dataTablesDeleteRow, [], $request);
        });

        if ($response->getHttpResponseCode() && $response->getHttpResponseCode() < 299) {
            return true;
        }

        return false;
    }

    /**
     * Search datatable for rows.
     *
     * @param \ExpertSender\Requests\DataTable\SearchDataTableRequest
     * @return int
     */
    public function countSearchDataTable(SearchDataTableRequest $request): int
    {
        $this->searchDataTableValidator->validate($request);

        $request = XMLSerializer::generateValidXmlFromObject($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendPost(Endpoint::$dataTablesGetDataCount, [], $request);
        });

        if (!$response->getHttpResponseCode() || $response->getHttpResponseCode() > 299) {
            return 0;
        }

        $responseXml = simplexml_load_string($response->getBody());

        if (!isset($responseXml->Count)) {
            return 0;
        }

        return (int)$responseXml->Count;
    }

    /**
     * Search datatable for rows.
     * It will return string in text/csv format.
     *
     * @param \ExpertSender\Requests\DataTable\SearchDataTableRequest
     * @return string
     */
    public function searchDataTable(SearchDataTableRequest $request): string
    {
        $this->searchDataTableValidator->validate($request);

        $request = XMLSerializer::generateValidXmlFromObject($request);

        $response = $this->dispatch(function () use ($request) {
            return $this->httpClient->sendPost(Endpoint::$dataTablesGetData, [], $request);
        });

        return $response->getBody();
    }
}
