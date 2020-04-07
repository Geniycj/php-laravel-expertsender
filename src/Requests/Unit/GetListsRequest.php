<?php

namespace ExpertSender\Requests\Unit;

use ExpertSender\Requests\BaseRequest;

class GetListsRequest extends BaseRequest
{
    /** @var string */
    public $apiKey;

    /**
     * Creates new GetListsRequest object instance.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
