<?php

namespace ExpertSender;

use Closure;
use Throwable;
use ExpertSender\Abstracts\IBaseExpertSender;

class BaseExpertSender implements IBaseExpertSender
{
    private $apiUrl;

    private $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('expert-sender.api-url');
    }

    public function setApiUrl(string $apiUrl): void
    {
        $this->apiUrl = $apiUrl;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function dispatch(Closure $callback)
    {
        try {
            $response = $callback();
        } catch(Throwable $e) {
            throw new ExpertSenderException($e->getMessage(), $e->getCode());
        }

        return $response;
    }
}
