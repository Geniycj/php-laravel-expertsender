<?php

namespace ExpertSender\Requests\DataTable;

use ExpertSender\Requests\BaseRequest;

class AddMultiDataTableRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var string */
    public $tableName;
    /** @var array */
    public $data;

    /**
     * Creates new AddEventRequest object instance.
     *
     * @param string $apiKey
     * @param string $tableName
     * @param array $rows
     */
    public function __construct(string $apiKey, string $tableName, array $rows)
    {
        $this->apiKey = $apiKey;
        $this->tableName = $tableName;
        $this->data = $rows;
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
