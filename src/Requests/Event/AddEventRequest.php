<?php

namespace ExpertSender\Requests\Event;

use ExpertSender\Requests\Event\EventData;
use ExpertSender\Requests\BaseRequest;

class AddEventRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var array */
    public $data;

    /**
     * Creates new AddEventRequest object instance.
     *
     * @param string $apiKey
     * @param \ExpertSender\Requests\Event\EventData $data
     */
    public function __construct(string $apiKey, EventData $data)
    {
        $this->apiKey = $apiKey;
        $this->data = $data;
    }

    /**
     * Nodes names to skip on building xml.
     *
     * @return array
     */
    public function dontPackNodes(): array
    {
        return ['EventData'];
    }
}
