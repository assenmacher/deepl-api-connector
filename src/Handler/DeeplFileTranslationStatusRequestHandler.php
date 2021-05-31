<?php

declare(strict_types=1);

namespace Scn\DeeplApiConnector\Handler;

use Scn\DeeplApiConnector\Model\FileSubmissionInterface;

final class DeeplFileTranslationStatusRequestHandler extends AbstractDeeplRequestHandler implements DeeplRequestHandlerInterface
{
    const API_ENDPOINT = '/v2/document/%s';

    private $fileSubmission;

    public function __construct(string $authKey, FileSubmissionInterface $fileSubmission)
    {
        $this->authKey = $authKey;
        $this->fileSubmission = $fileSubmission;
    }

    public function getMethod(): string
    {
        return DeeplRequestHandlerInterface::METHOD_GET;
    }

    public function getPath(): string
    {
        return sprintf(parent::getPath(), $this->fileSubmission->getDocumentId());
    }

    public function getBody(): array
    {
        return [
            'form_params' => array_filter(
                [
                    'auth_key' => $this->authKey,
                    'document_key' => $this->fileSubmission->getDocumentKey(),
                ]
            ),
        ];
    }
}
