<?php declare(strict_types=1);

namespace App\Provider;

use App\Entity\Template;

use App\Utils\TemplateManager;
use Doctrine\ORM\EntityManagerInterface;

final class MailerProvider implements MailerProviderInterface
{
    private $em;
    private $mailer;
    public function __construct(EntityManagerInterface $em, \Swift_Mailer $mailer)
    {
        $this->em = $em;
        $this->mailer = $mailer;
    }

    public function sendEmail(string $templateId, string $destination, array $data)
    {
        $templateManager = new TemplateManager();
        $repository =  $this->em->getRepository(Template::class);

        $template =  $repository->findOneBy(['templateId' => $templateId]);

        if ($templateId === 'confirmation_001') {
            $tpl = $templateManager->getTemplateComputed($template, $data);
            $subject = $tpl['subject'];
            $content = $tpl['content'];
        } else {
            $subject = '';
            $content = '';
        }
        $message = (new \Swift_Message($subject))
            ->setFrom('anouar.souid.q3@gmail.com')
            ->setTo($destination)
            ->setBody(
                $content,'text/html'
            )
        ;
        $this->mailer->send($message);

    }
}