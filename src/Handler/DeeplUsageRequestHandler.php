<?php

declare(strict_types=1);

namespace Scn\DeeplApiConnector\Handler;

final class DeeplUsageRequestHandler implements DeeplRequestHandlerInterface
{
    const API_ENDPOINT = 'https://api.deepl.com/v2/usage';

    private $authKey;

    public function __construct(string $authKey)
    {
        $this->authKey = $authKey;
    }

    public function getMethod(): string
    {
        return DeeplRequestHandlerInterface::METHOD_POST;
    }

    public function getPath(): string
    {
        return static::API_ENDPOINT;
    }

    public function getBody(): array
    {
        return [
            'headers' => [
                'Authorization' => 'DeepL-Auth-Key '.$this->authKey,
            ],
            'form_params' => array_filter(
                [
                ]
            ),
        ];
    }
}
