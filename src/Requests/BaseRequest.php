<?php

namespace ExpertSender\Requests;

class BaseRequest
{
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
