<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Requests\DataTable\Add\Row;
use ExpertSender\Requests\DataTable\Add\Column;
use ExpertSender\Requests\DataTable\AddMultiDataTableRequest;
use ExpertSender\Validators\Abstracts\IMultiDataTableValidator;

class MultiDataTableValidator implements IMultiDataTableValidator
{
    /**
     * Validate ExpertSender Add DataTable Row request.
     *
     * @param \ExpertSender\Requests\DataTable\AddDataTableRequest
     * @return void
     */
    public function validate(AddMultiDataTableRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }

        if (!$request->tableName) {
            throw new ExpertSenderException(Error::$missingTableName);
        }

        if (!is_array($request->data)) {
            throw new ExpertSenderException(Error::$wrongTypeMultiDataArray);
        }

        foreach ($request->data as $data) {

            if (!($data instanceof Row)) {
                throw new ExpertSenderException(Error::$wrongOneOfRowObject);
            }

            if (!is_array($data->columns)) {
                throw new ExpertSenderException(Error::$wrongTypeMultiDataOneRowArray);
            }

            foreach ($data->columns as $column) {

                if (!($column instanceof Column)) {
                    throw new ExpertSenderException(Error::$wrongAddColumnType);
                }

                if (!$column->name) {
                    throw new ExpertSenderException(Error::$missingColumnName);
                }

                if (!isset($column->value) || $column->value == '') {
                    throw new ExpertSenderException(Error::$missingColumnValue);
                }

            }

        }
    }
}
