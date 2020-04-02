<?php

namespace ExpertSender\Requests\DataTable\Search;

use ExpertSender\Requests\BaseRequest;

class Where extends BaseRequest
{
    /** @var string */
    public $columnName;
    /** @var string */
    public $value;
    /** @var string */
    public $operator;

    /**
     * Creates new DataTable where condition object instance.
     *
     * @param string $columnName
     * @param string $value
     * @param string $operator
     */
    public function __construct(string $columnName, string $value, string $operator = 'Equals')
    {
        $this->columnName = $columnName;
        $this->value = $value;
        $this->operator = $operator;
    }
}
