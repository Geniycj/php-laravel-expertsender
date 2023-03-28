<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\DataTable\ClearDataTableRequest;

interface IClearDataTableValidator
{
    public function validate(ClearDataTableRequest $request);
}
