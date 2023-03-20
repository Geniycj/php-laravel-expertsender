<?php

namespace ExpertSender\Requests\DataTable\Add;

use ExpertSender\Requests\BaseRequest;

class Row extends BaseRequest
{
    /** @var ?array */
    public $primaryKeyColumns;
    
    /** @var array */
    public $columns;

    /**
     * Creates new DataTable add row instance.
     *
     * @param array $columns
     */
    public function __construct(array $columns, ?array $primaryKeyColumns = null)
    {
        $this->primaryKeyColumns = $primaryKeyColumns;
        
        $this->columns = $columns;
    }
}
