<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\Subscriber\GetSubscriberRequest;

interface IGetSubscriberListsValidator
{
    public function validate(GetSubscriberRequest $request);
}
