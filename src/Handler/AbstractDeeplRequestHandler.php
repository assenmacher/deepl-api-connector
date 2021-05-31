<?php
declare(strict_types=1);

namespace Scn\DeeplApiConnector\Handler;

abstract class AbstractDeeplRequestHandler
{
    const API_DOMAIN      = 'https://api.deepl.com';
    const API_TEST_DOMAIN = 'https://api-free.deepl.com';
    const API_TEST_KEY_PART = ':fx';

    protected $authKey;

    public function getPath(): string
    {
        return (strpos($this->authKey, self::API_TEST_KEY_PART) === false ? self::API_DOMAIN : self::API_TEST_DOMAIN).static::API_ENDPOINT;
    }
}