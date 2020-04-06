<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\Subscriber\DeleteSubscriberRequest;

interface IDeleteSubscriberValidator
{
    public function validate(DeleteSubscriberRequest $request);
}
