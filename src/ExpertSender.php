<?php

namespace ExpertSender;

use SimpleXMLElement;
use ExpertSender\Statics\Endpoint;
use ExpertSender\Packages\XMLSerializer;
use ExpertSender\Abstracts\IExpertSender;
use ExpertSender\Requests\Event\AddEventRequest;
use ExpertSender\Packages\HttpClient\IHttpClient;
use ExpertSender\Validators\Abstracts\IAddEventValidator;
use ExpertSender\Requests\Subscriber\GetSubscriberRequest;
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
     * Creates new object instance.
     */
    public function __construct(
        IHttpClient $httpClient,
        IAddEventValidator $addEventValidator,
        IAddAndUpdateSubscriberValidator $addAndUpdateSubscriberValidator,
        IGetSubscriberListsValidator $getSubscriberListsValidator
    ) {
        parent::__construct();
        $this->httpClient = $httpClient;
        $this->addEventValidator = $addEventValidator;
        $this->addAndUpdateSubscriberValidator = $addAndUpdateSubscriberValidator;
        $this->getSubscriberListsValidator = $getSubscriberListsValidator;
        $this->httpClient->setBaseUrl($this->getApiUrl());
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

}
