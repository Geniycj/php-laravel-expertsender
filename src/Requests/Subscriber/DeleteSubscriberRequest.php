<?php

namespace ExpertSender\Requests\Subscriber;

use ExpertSender\Requests\BaseRequest;

class DeleteSubscriberRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var string */
    public $email;
    /** @var int */
    public $listId;

    /**
     * Creates new DeleteSubscriptionRequest object instance.
     *
     * @param string $id
     * @param string $email
     * @param int $listId
     */
    public function __construct(string $apiKey, string $email, ?int $listId = null)
    {
        $this->apiKey = $apiKey;
        $this->email = $email;
        $this->listId = $listId;
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
