<?php

namespace ExpertSender\Packages\HttpClient;

use GuzzleHttp\Client;
use ExpertSender\Packages\HttpClient\IHttpClient;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class HttpClient implements IHttpClient
{
    /**
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var string|null
     */
    protected $baseUrl = null;

    /**
     * @var int
     */
    protected $maxTimeout = 15;

    /**
     * @var IHttpResponse
     */
    protected $httpResponse;

    /**
     * @var array
     */
    public $headers = null;

    /**
     * @param \GuzzleHttp\Client $client
     * @param IHttpResponse $client
     */
    public function __construct(Client $client, IHttpResponse $httpResponse)
    {
        $this->client = $client;
        $this->httpResponse = $httpResponse;
    }

    /**
     * @param string $baseUri
     */
    public function setMaxTimeout(int $maxTimeout): void
    {
        $this->maxTimeout = $maxTimeout;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(?string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param array $header
     * @param string $value
     */
    public function addHeader(string $header, string $value): void
    {
        $this->headers[$header] = $value;
    }

    /**
     * @return array|null
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * @return string|null
     */
    public function getBaseUrl(): ?string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $headers
     * @param string|null $body
     * @param string $timeOut
     * @return IHttpResponse
     * @throws \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     */
    public function send($method, $uri, array $headers, $body)
    {
        $request = new \GuzzleHttp\Psr7\Request($method, $this->url($uri), $headers, $body);

        try {
            $response = $this->client->send($request, [
                'timeout' => $this->maxTimeout,
                'connect_timeout' => $this->maxTimeout,
                'verify' => false
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            throw new BadRequestHttpException($e->getMessage(), $e->getPrevious(), $e->getCode());
        }

        $this->httpResponse->setHeaders($response->getHeaders());
        $this->httpResponse->setBody($response->getBody()->getContents());
        $this->httpResponse->setHttpResponseCode($response->getStatusCode());

        return $this->httpResponse;
    }

    /**
     * @param string $uri
     * @param array $headers
     * @param $body
     * @return IHttpResponse
     * @throws \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     */
    public function sendPost($uri, array $headers, $body)
    {
        return $this->send('post', $uri, $headers, $body);
    }

    /**
     * @param string $uri
     * @param array $headers
     * @param $body
     * @return IHttpResponse
     * @throws \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     */
    public function sendGet($uri, array $headers, $body)
    {
        return $this->send('get', $uri, $headers, $body);
    }

    /**
     * @param string $uri
     * @return mixed
     */
    private function url($uri): string
    {
        if (!empty($this->getBaseUrl())) {
            return $this->getBaseUrl() . $uri;
        }

        return $uri;
    }
}
