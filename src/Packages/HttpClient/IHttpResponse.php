<?php

namespace ExpertSender\Packages\HttpClient;

interface IHttpResponse
{
    public function getHeaders(): array;
    public function getBody(): string;
    public function getHttpResponseCode(): string;
    public function setHeaders(array $headers): void;
    public function setBody(string $body): void;
    public function setHttpResponseCode(int $httpResponseCode): void;
}
