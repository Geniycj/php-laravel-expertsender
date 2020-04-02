<?php

namespace ExpertSender\Requests\DataTable;

use ExpertSender\Requests\BaseRequest;

class DeleteDataTableRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var string */
    public $tableName;
    /** @var array */
    public $primaryKeyColumns;

    /**
     * Creates new AddEventRequest object instance.
     *
     * @param string $apiKey
     * @param string $tableName
     * @param array $primaryKeyColumns
     */
    public function __construct(string $apiKey, string $tableName, array $primaryKeyColumns)
    {
        $this->apiKey = $apiKey;
        $this->tableName = $tableName;
        $this->primaryKeyColumns = $primaryKeyColumns;
    }

    /**
     * Nodes names to skip on building xml.
     *
     * @return array
     */
    public function dontPackNodes(): array
    {
        return [];
    }
}
