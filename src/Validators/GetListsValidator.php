<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Requests\Unit\GetListsRequest;
use ExpertSender\Validators\Abstracts\IGetListsValidator;

class GetListsValidator implements IGetListsValidator
{
    /**
     * Validate new ExpertSender event request.
     *
     * @param \ExpertSender\Requests\Unit\GetListsRequest
     * @return void
     */
    public function validate(GetListsRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }
    }
}
