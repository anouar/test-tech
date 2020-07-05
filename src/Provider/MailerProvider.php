<?php declare(strict_types=1);

namespace App\Provider;

use App\Client\MailerInterface;
use App\Utils\Template;
use App\Utils\TemplateManager;

final class MailerProvider implements MailerProviderInterface
{
    private MailerInterface $client;

    public function __construct(MailerInterface $client)
    {
        $this->client = $client;
    }

    public function sendEmail(string $templateId, string $destination, array $data)
    {
        $templateManager = new TemplateManager();
        if ($templateId === 'confirmation_001') {
            $tpl = $templateManager->getTemplateComputed($this->confirmTemplate(), $data);
            $subject = $tpl->subject;
            $message = $tpl->content;
        } else {
            $subject = '';
            $message = '';
        }

        $this->client->sendEmail(
            $templateId,
            $destination,
            ['subject' => $subject, 'message' => $message]
        );
    }
}
