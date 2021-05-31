<?php

declare(strict_types=1);

namespace Scn\DeeplApiConnector\Handler;

final class DeeplUsageRequestHandler extends AbstractDeeplRequestHandler implements DeeplRequestHandlerInterface
{
    const API_ENDPOINT = '/v2/usage';

    public function __construct(string $authKey)
    {
        $this->authKey = $authKey;
    }

    public function getMethod(): string
    {
        return DeeplRequestHandlerInterface::METHOD_GET;
    }

    public function getBody(): array
    {
        return [
            'form_params' => array_filter(
                [
                    'auth_key' => $this->authKey,
                ]
            ),
        ];
    }
}
