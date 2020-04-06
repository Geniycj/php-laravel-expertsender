<?php

namespace ExpertSender\Requests\Subscriber;

use ExpertSender\Requests\BaseRequest;

class DeleteSubscriberRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var string */
    public $email;

    /**
     * Creates new DeleteSubscriptionRequest object instance.
     *
     * @param string $id
     * @param string $email
     */
    public function __construct(string $apiKey, string $email)
    {
        $this->apiKey = $apiKey;
        $this->email = $email;
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
