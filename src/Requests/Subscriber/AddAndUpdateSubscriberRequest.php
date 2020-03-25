<?php

namespace ExpertSender\Requests\Subscriber;

use ExpertSender\Requests\BaseRequest;
use ExpertSender\Requests\Subscriber\AddAndUpdate\SubscriberData;

class AddAndUpdateSubscriberRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var \ExpertSender\Requests\Subscriber\AddAndUpdate\SubscriberData */
    public $data;

    /**
     * Creates new AddAndUpdateSubscriberRequest object instance.
     *
     * @param string $id
     * @param SubscriberData $data
     * @param array $properties
     */
    public function __construct(string $apiKey, SubscriberData $data, array $properties = [])
    {
        $this->apiKey = $apiKey;
        $this->data = $data;
        $this->data->properties = $properties;
    }

    /**
     * Nodes names to skip on building xml.
     *
     * @return array
     */
    public function dontPackNodes(): array
    {
        return ['SubscriberData'];
    }
}
