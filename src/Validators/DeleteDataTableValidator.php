<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Requests\DataTable\Delete\Column;
use ExpertSender\Requests\DataTable\DeleteDataTableRequest;
use ExpertSender\Validators\Abstracts\IDeleteDataTableValidator;

class DeleteDataTableValidator implements IDeleteDataTableValidator
{
    /**
     * Validate ExpertSender Delete DataTable Row request.
     *
     * @param \ExpertSender\Requests\DataTable\DeleteDataTableRequest
     * @return void
     */
    public function validate(DeleteDataTableRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }

        if (!$request->tableName) {
            throw new ExpertSenderException(Error::$missingTableName);
        }

        if (!is_array($request->primaryKeyColumns)) {
            throw new ExpertSenderException(Error::$wrongTypeDeletePrimaryKeyColumns);
        }

        foreach ($request->primaryKeyColumns as $column) {

            if (!($column instanceof Column)) {
                throw new ExpertSenderException(Error::$wrongOneOfDeleteColumnObject);
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
