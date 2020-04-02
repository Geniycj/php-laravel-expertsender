<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\DataTable\AddDataTableRequest;

interface IAddDataTableValidator
{
    public function validate(AddDataTableRequest $request);
}
