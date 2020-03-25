<?php

namespace ExpertSender\Requests\Subscriber\AddAndUpdate;

use ExpertSender\Requests\BaseRequest;

class Property extends BaseRequest
{
    /** @var int */
    public $id;
    /** @var string */
    public $value;

    /**
     * Creates new Property object instance.
     *
     * @param int $id
     * @param string $value
     */
    public function __construct(int $id, string $value)
    {
        $this->id = $id;
        $this->value = $value;
    }
}
