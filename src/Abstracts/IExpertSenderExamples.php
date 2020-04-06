<?php

namespace ExpertSender\Abstracts;

interface IExpertSenderExamples
{
    public function getSubscriberLists(): void;
    public function addAndUpdateSubscriber(): void;
    public function deleteSubscriber(): void;
    public function addEvent(): void;
    public function addDataTable(): void;
    public function deleteDataTable(): void;
    public function countSearchDataTable(): void;
    public function searchDataTable(): void;
}
