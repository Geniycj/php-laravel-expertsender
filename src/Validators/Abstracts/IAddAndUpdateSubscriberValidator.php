<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest;

interface IAddAndUpdateSubscriberValidator
{
    public function validate(AddAndUpdateSubscriberRequest $request);
}
