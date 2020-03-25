<?php

namespace ExpertSender\Requests\Event;

use ExpertSender\Requests\BaseRequest;

class EventData extends BaseRequest
{
    /** @var int */
    public $customEventId;
    /** @var int */
    public $subscriberId;
    /** @var array */
    public $dataFields = [];

    /**
     * Creates new Data object instance.
     *
     * @param int $customEventId
     * @param int $subscriberId
     * @param array $dataFields
     */
    public function __construct(int $customEventId, int $subscriberId, array $dataFields = [])
    {
        $this->customEventId = $customEventId;
        $this->subscriberId = $subscriberId;
        $this->dataFields = $dataFields;
    }
}
