<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Requests\Subscriber\AddAndUpdate\Property;
use ExpertSender\Requests\Subscriber\AddAndUpdate\SubscriberData;
use ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest;
use ExpertSender\Validators\Abstracts\IAddAndUpdateSubscriberValidator;

class AddAndUpdateSubscriberValidator implements IAddAndUpdateSubscriberValidator
{
    /**
     * Validate ExpertSender request.
     *
     * @param \ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest
     * @return void
     */
    public function validate(AddAndUpdateSubscriberRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }

        if (!$request->data) {
            throw new ExpertSenderException(Error::$missingData);
        }

        if (!($request->data instanceof SubscriberData)) {
            throw new ExpertSenderException(Error::$wrongSubscriberDataFieldType);
        }

        if (!$request->data->mode) {
            throw new ExpertSenderException(Error::$missingMode);
        }

        if (!$request->data->listId) {
            throw new ExpertSenderException(Error::$missingListId);
        }

        if (!$request->data->email) {
            throw new ExpertSenderException(Error::$missingEmail);
        }

        if ($request->data->properties && !is_array($request->data->properties)) {
            throw new ExpertSenderException(Error::$propertiesIsNotArray);
        }

        if ($request->data->properties && count($request->data->properties) > 0) {
            foreach ($request->data->properties as $properties) {
                if (!($properties instanceof Property)) {
                    throw new ExpertSenderException(Error::$wrongOneOfPropertiesFieldObjects);
                }

                if (!$properties->id) {
                    throw new ExpertSenderException(Error::$missingPropertyId);
                }

                if (!is_int($properties->id)) {
                    throw new ExpertSenderException(Error::$propertyIdFieldIsNotInt);
                }

                if (!$properties->value) {
                    throw new ExpertSenderException(Error::$missingPropertyValue);
                }

            }
        }
    }
}
