<?php

namespace ExpertSender\Requests\DataTable\Delete;

use ExpertSender\Requests\BaseRequest;

class Column extends BaseRequest
{
    /** @var string */
    public $name;
    /** @var string */
    public $value;

    /**
     * Creates new DataTable delete row column instance.
     *
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
}
