<?php
declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client as HTTPClient;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

/**
 * Class Interview
 * @package App\Services
 */
class Request
{
    /**
     * @var HTTPClient
     */
    protected $httpClient;
    /**
     * @var string
     */
    protected $url;

    /**
     * Interview constructor.
     *
     * @param HTTPClient $client
     * @param            $url
     */
    public function __construct(HTTPClient $client, $url)
    {
        $this->httpClient = $client;
        $this->url = $url;
    }

    /**
     * @param string? $url
     *
     * @return void
     */
    public function post(): void
    {
        Log::info("Sending request to {$this->url}");

        /** @var ResponseInterface $response */
        $response = $this->httpClient->post($this->url, ['verify' => false]);
        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            throw new RuntimeException("Failed with code {$response->getStatusCode()}: {$response->getReasonPhrase()}");
        }

        Log::info('Success. Got message: ' . $response->getBody()->getContents());
    }
}
