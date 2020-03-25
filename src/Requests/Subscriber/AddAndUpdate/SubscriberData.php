<?php

namespace ExpertSender\Requests\Subscriber\AddAndUpdate;

use ExpertSender\Requests\BaseRequest;

class SubscriberData extends BaseRequest
{
    /** @var string */
    public $mode = 'AddAndUpdate';
    /** @var int */
    public $listId;
    /** @var string */
    public $email;
    /** @var string */
    public $firstname;
    /** @var string */
    public $lastname;
    /** @var string */
    public $phone;
    /** @var string */
    public $vendor;
    /** @var \ExpertSender\Requests\Subscriber\AddAndUpdate\Property[] */
    public $properties;

    /**
     * Creates new SubscriberData object instance.
     *
     * @param int $listId
     * @param string $email
     */
    public function __construct(int $listId, string $email)
    {
        $this->listId = $listId;
        $this->email = $email;
    }
}
