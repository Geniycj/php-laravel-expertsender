<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Requests\Subscriber\DeleteSubscriberRequest;
use ExpertSender\Validators\Abstracts\IDeleteSubscriberValidator;

class DeleteSubscriberValidator implements IDeleteSubscriberValidator
{
    /**
     * Validate ExpertSender request.
     *
     * @param \ExpertSender\Requests\Subscriber\DeleteSubscriberRequest
     * @return void
     */
    public function validate(DeleteSubscriberRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }

        if (!$request->email) {
            throw new ExpertSenderException(Error::$missingEmail);
        }
    }
}
