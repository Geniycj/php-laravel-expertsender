<?php

namespace ExpertSender\Requests\DataTable;

use ExpertSender\Requests\BaseRequest;

class SearchDataTableRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var string */
    public $tableName;
    /** @var array */
    public $whereConditions;
    /** @var int */
    public $limit = 50;

    /**
     * Creates new AddEventRequest object instance.
     *
     * @param string $apiKey
     * @param string $tableName
     * @param array $whereConditions
     */
    public function __construct(string $apiKey, string $tableName, array $whereConditions)
    {
        $this->apiKey = $apiKey;
        $this->tableName = $tableName;
        $this->whereConditions = $whereConditions;
    }

    /**
     * Set number of rows in response table.
     *
     * @param int $limit
     * @return void
     */
    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
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
