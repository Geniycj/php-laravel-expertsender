<?php

namespace ExpertSender\Requests\DataTable;

use ExpertSender\Requests\BaseRequest;

class AddDataTableRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var string */
    public $tableName;
    /** @var array */
    public $multiData;

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
        $this->multiData = $rows;
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
