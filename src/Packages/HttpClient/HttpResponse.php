<?php

namespace ExpertSender\Packages\HttpClient;

class HttpResponse implements IHttpResponse
{
    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string
     */
    protected $httpResponseCode;

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getHttpResponseCode(): string
    {
        return $this->httpResponseCode;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param int $httpResponseCode
     */
    public function setHttpResponseCode(int $httpResponseCode): void
    {
        $this->httpResponseCode = $httpResponseCode;
    }
}
