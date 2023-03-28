<?php

namespace ExpertSender\Requests\DataTable;

use ExpertSender\Requests\BaseRequest;

class ClearDataTableRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var string */
    public $tableName;

    /**
     * Creates new ClearDataTableRequest object instance.
     *
     * @param string $apiKey
     * @param string $tableName
     */
    public function __construct(string $apiKey, string $tableName)
    {
        $this->apiKey = $apiKey;
        $this->tableName = $tableName;
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
