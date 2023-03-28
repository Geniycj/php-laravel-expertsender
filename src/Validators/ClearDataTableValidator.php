<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Requests\DataTable\ClearDataTableRequest;
use ExpertSender\Validators\Abstracts\IClearDataTableValidator;

class ClearDataTableValidator implements IClearDataTableValidator
{
    /**
     * Validate ExpertSender Delete DataTable Row request.
     *
     * @param \ExpertSender\Requests\DataTable\ClearDataTableRequest
     * @return void
     */
    public function validate(ClearDataTableRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }

        if (!$request->tableName) {
            throw new ExpertSenderException(Error::$missingTableName);
        }
    }
}
