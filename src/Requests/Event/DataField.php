<?php

namespace ExpertSender\Requests\Event;

use ExpertSender\Requests\BaseRequest;

class DataField extends BaseRequest
{
    /** @var string */
    public $name;
    /** @var string */
    public $type;
    /** @var string */
    public $value;

    /**
     * Creates new DataField object instance.
     *
     * @param string $name
     * @param string $value
     * @param string $type
     */
    public function __construct(string $name, string $value, string $type = 'Text')
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }
}
