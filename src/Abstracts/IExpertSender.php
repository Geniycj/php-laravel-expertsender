<?php

namespace ExpertSender\Abstracts;

use SimpleXMLElement;
use ExpertSender\Requests\Event\AddEventRequest;
use ExpertSender\Requests\DataTable\AddDataTableRequest;
use ExpertSender\Requests\Subscriber\GetSubscriberRequest;
use ExpertSender\Requests\DataTable\DeleteDataTableRequest;
use ExpertSender\Requests\DataTable\SearchDataTableRequest;
use ExpertSender\Requests\Subscriber\DeleteSubscriberRequest;
use ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest;

interface IExpertSender
{
    public function getSubscriberLists(GetSubscriberRequest $request): SimpleXMLElement;
    public function addAndUpdateSubscriber(AddAndUpdateSubscriberRequest $request): bool;
    public function deleteSubscriber(DeleteSubscriberRequest $request): bool;
    public function addEvent(AddEventRequest $request): bool;
    public function addDataTable(AddDataTableRequest $request): bool;
    public function deleteDataTable(DeleteDataTableRequest $request): bool;
    public function countSearchDataTable(SearchDataTableRequest $request): int;
    public function searchDataTable(SearchDataTableRequest $request): string;
}
