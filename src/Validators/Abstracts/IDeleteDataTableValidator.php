<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\DataTable\DeleteDataTableRequest;

interface IDeleteDataTableValidator
{
    public function validate(DeleteDataTableRequest $request);
}
