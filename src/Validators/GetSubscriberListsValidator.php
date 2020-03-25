<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Requests\Subscriber\GetSubscriberRequest;
use ExpertSender\Validators\Abstracts\IGetSubscriberListsValidator;

class GetSubscriberListsValidator implements IGetSubscriberListsValidator
{
    /**
     * Validate new ExpertSender event request.
     *
     * @param \ExpertSender\Requests\Subscriber\GetSubscriberRequest
     * @return void
     */
    public function validate(GetSubscriberRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }

        if (!$request->email) {
            throw new ExpertSenderException(Error::$missingEmail);
        }
    }
}
