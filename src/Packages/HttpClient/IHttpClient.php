<?php

namespace ExpertSender\Packages\HttpClient;

interface IHttpClient
{
    public function setMaxTimeout(int $maxTimeout): void;
    public function setBaseUrl(?string $baseUrl): void;
    public function addHeader(string $header, string $value): void;
    public function getHeaders(): ?array;
    public function getBaseUrl(): ?string;
    public function send($method, $uri, array $headers, $body);
    public function sendPost($uri, array $headers, $body);
    public function sendGet($uri, array $headers, $body);
    public function sendDelete($uri, array $headers, $body);
}
