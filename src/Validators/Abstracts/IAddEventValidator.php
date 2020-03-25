<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\Event\AddEventRequest;

interface IAddEventValidator
{
    public function validate(AddEventRequest $request);
}
