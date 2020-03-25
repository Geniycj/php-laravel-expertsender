<?php

namespace ExpertSender\Requests\Subscriber;

use ExpertSender\Requests\BaseRequest;

class GetSubscriberRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;
    /** @var string */
    public $email;
    /** @var string */
    public $status;
    /** @var string */
    public $option;

    /**
     * Creates new GetSubscriberRequest object instance.
     *
     * @param string $apiKey
     * @param string $email
     * @param string $status
     * @param string $option
     */
    public function __construct(string $apiKey, string $email, string $status = 'Active', string $option = 'Full')
    {
        $this->apiKey = $apiKey;
        $this->email = $email;
        $this->status = $status;
        $this->option = $option;
    }
}
