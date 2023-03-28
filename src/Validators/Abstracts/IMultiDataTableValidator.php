<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\DataTable\AddMultiDataTableRequest;

interface IMultiDataTableValidator
{
    public function validate(AddMultiDataTableRequest $request, $allowEmptyValues = false);
}
