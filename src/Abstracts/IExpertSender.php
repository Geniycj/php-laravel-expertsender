<?php

namespace ExpertSender\Abstracts;

use ExpertSender\Requests\Event\AddEventRequest;
use ExpertSender\Requests\Subscriber\GetSubscriberRequest;
use ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest;

interface IExpertSender
{
    public function getSubscriberLists(GetSubscriberRequest $request);
    public function addAndUpdateSubscriber(AddAndUpdateSubscriberRequest $request): bool;
    public function addEvent(AddEventRequest $request);
}
