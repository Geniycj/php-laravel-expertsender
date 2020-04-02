<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\DataTable\SearchDataTableRequest;

interface ISearchDataTableValidator
{
    public function validate(SearchDataTableRequest $request);
}
