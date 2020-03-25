<?php

namespace ExpertSender\Abstracts;

use Closure;

interface IBaseExpertSender
{
    public function setApiUrl(string $apiUrl): void;
    public function getApiUrl(): string;
    public function setApiKey(string $apiKey): void;
    public function getApiKey(): string;
    public function dispatch(Closure $callback);
}
