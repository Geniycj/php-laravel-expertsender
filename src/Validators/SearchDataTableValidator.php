<?php

namespace ExpertSender\Validators;

use ExpertSender\ExpertSenderException;
use ExpertSender\Requests\DataTable\Search\Where;
use ExpertSender\Requests\DataTable\SearchDataTableRequest;
use ExpertSender\Statics\Messages\Error;
use ExpertSender\Validators\Abstracts\ISearchDataTableValidator;

class SearchDataTableValidator implements ISearchDataTableValidator
{
    /**
     * Validate ExpertSender Search DataTable request.
     *
     * @param \ExpertSender\Requests\DataTable\SearchDataTableRequest
     * @return void
     */
    public function validate(SearchDataTableRequest $request)
    {
        if (!$request->apiKey) {
            throw new ExpertSenderException(Error::$missingApiKey);
        }

        if (!$request->tableName) {
            throw new ExpertSenderException(Error::$missingTableName);
        }

        if (!is_array($request->whereConditions)) {
            throw new ExpertSenderException(Error::$wrongTypeMultiDataArray);
        }

        foreach ($request->whereConditions as $whereCondition) {

            if (!($whereCondition instanceof Where)) {
                throw new ExpertSenderException(Error::$wrongOneOfWhereObject);
            }

            if (!$whereCondition->columnName) {
                throw new ExpertSenderException(Error::$missingColumnName);
            }

            if (!$whereCondition->value) {
                throw new ExpertSenderException(Error::$missingColumnValue);
            }

            if (!$whereCondition->operator) {
                throw new ExpertSenderException(Error::$missingColumnOperator);
            }

        }
    }
}
