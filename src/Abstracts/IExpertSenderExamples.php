<?php

namespace ExpertSender\Abstracts;

interface IExpertSenderExamples
{
    public function getSubscriberLists(): void;
    public function addAndUpdateSubscriber(): void;
    public function addEvent(): void;
}
