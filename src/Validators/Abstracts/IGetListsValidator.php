<?php

namespace ExpertSender\Validators\Abstracts;

use ExpertSender\Requests\Unit\GetListsRequest;

interface IGetListsValidator
{
    public function validate(GetListsRequest $request);
}
