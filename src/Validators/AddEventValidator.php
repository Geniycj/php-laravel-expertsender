<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Requests\Event\AddEventRequest;
use ExpertSender\Requests\Event\DataField;
use ExpertSender\Validators\Abstracts\IAddEventValidator;

class AddEventValidator implements IAddEventValidator
{
    /**
     * Validate new ExpertSender event request.
     *
     * @param \ExpertSender\Requests\Event\AddEventRequest
     * @return void
     */
    public function validate(AddEventRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }

        if (!$request->data) {
            throw new ExpertSenderException(Error::$missingEventDataField);
        }

        if (!$request->data->customEventId) {
            throw new ExpertSenderException(Error::$missingEventId);
        }

        if (!$request->data->subscriberId) {
            throw new ExpertSenderException(Error::$missingSubscriberId);
        }

        if (!$request->data->dataFields) {
            throw new ExpertSenderException(Error::$missingDataFields);
        }

        if (!is_array($request->data->dataFields)) {
            throw new ExpertSenderException(Error::$wrongDataFieldsType);
        }

        foreach ($request->data->dataFields as $dataField) {
            if (!($dataField instanceof DataField)) {
                throw new ExpertSenderException(Error::$wrongOneOfDataFieldObjects);
            }
        }
    }
}
