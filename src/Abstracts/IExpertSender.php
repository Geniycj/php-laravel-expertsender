<?php

namespace ExpertSender\Abstracts;

use SimpleXMLElement;
use ExpertSender\Requests\Unit\GetListsRequest;
use ExpertSender\Requests\Event\AddEventRequest;
use ExpertSender\Requests\DataTable\AddDataTableRequest;
use ExpertSender\Requests\DataTable\ClearDataTableRequest;
use ExpertSender\Requests\Subscriber\GetSubscriberRequest;
use ExpertSender\Requests\DataTable\DeleteDataTableRequest;
use ExpertSender\Requests\DataTable\SearchDataTableRequest;
use ExpertSender\Requests\DataTable\AddMultiDataTableRequest;
use ExpertSender\Requests\Subscriber\DeleteSubscriberRequest;
use ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest;

interface IExpertSender
{
    public function getBusinessUnitLists(GetListsRequest $request): SimpleXMLElement;
    public function getSubscriberLists(GetSubscriberRequest $request): SimpleXMLElement;
    public function addAndUpdateSubscriber(AddAndUpdateSubscriberRequest $request): bool;
    public function deleteSubscriber(DeleteSubscriberRequest $request): bool;
    public function addEvent(AddEventRequest $request): bool;
    public function addDataTable(AddDataTableRequest $request): bool;
    public function addMultiDataTable(AddMultiDataTableRequest $request, $allowEmptyValues = false): bool;
    public function updateMultiDataTable(AddMultiDataTableRequest $request, $allowEmptyValues = false): bool;
    public function deleteDataTable(DeleteDataTableRequest $request): bool;
    public function clearDataTable(ClearDataTableRequest $request): bool;
    public function countSearchDataTable(SearchDataTableRequest $request): int;
    public function searchDataTable(SearchDataTableRequest $request): string;
}
