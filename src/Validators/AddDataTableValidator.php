<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Requests\DataTable\Add\Column;
use ExpertSender\Requests\DataTable\Add\Row;
use ExpertSender\Requests\DataTable\AddDataTableRequest;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Validators\Abstracts\IAddDataTableValidator;

class AddDataTableValidator implements IAddDataTableValidator
{
    /**
     * Validate ExpertSender Add DataTable Row request.
     *
     * @param \ExpertSender\Requests\DataTable\AddDataTableRequest
     * @return void
     */
    public function validate(AddDataTableRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }

        if (!$request->tableName) {
            throw new ExpertSenderException(Error::$missingTableName);
        }

        if (!is_array($request->multiData)) {
            throw new ExpertSenderException(Error::$wrongTypeMultiDataArray);
        }

        foreach ($request->multiData as $multiDataRow) {

            if (!($multiDataRow instanceof Row)) {
                throw new ExpertSenderException(Error::$wrongOneOfRowObject);
            }

            if (!is_array($multiDataRow->columns)) {
                throw new ExpertSenderException(Error::$wrongTypeMultiDataOneRowArray);
            }

            foreach ($multiDataRow->columns as $column) {

                if (!($column instanceof Column)) {
                    throw new ExpertSenderException(Error::$wrongAddColumnType);
                }

                if (!$column->name) {
                    throw new ExpertSenderException(Error::$missingColumnName);
                }

                if (!$column->value) {
                    throw new ExpertSenderException(Error::$missingColumnValue);
                }

            }

        }
    }
}
