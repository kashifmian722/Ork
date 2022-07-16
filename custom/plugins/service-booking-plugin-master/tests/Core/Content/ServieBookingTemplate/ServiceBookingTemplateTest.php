<?php declare(strict_types=1);
namespace Swag\ServiceBooking\Test\ServiceBookingTemplate;

use PHPUnit\Framework\TestCase;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Test\TestCaseBase\AdminFunctionalTestBehaviour;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Core\PlatformRequest;
use Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\ServiceBookingTemplateEntity;
use Symfony\Component\HttpFoundation\Response;

class TemplateApiTest extends TestCase
{
    use AdminFunctionalTestBehaviour;
    public function testCreateTemplate(): void
    {
        $templateId = Uuid::randomHex();
        $dateId = Uuid::randomHex();
        $templateData = [
            'id' => $templateId,
            'type' => 'service',
            'dates' => [
                [
                    'id' => $dateId,
                    'startDate' => new \DateTime('-1'),
                    'endDate' => new \DateTime('+1'),
                ]
            ]
        ];
        $this->createTemplate($templateData, $templateId);
    }
    private function createTemplate(array $templateData, string $templateId): ServiceBookingTemplateEntity
    {
        $this->getBrowser()->request(
            'POST',
            '/api/v' . PlatformRequest::API_VERSION . '/swag-service-booking-template',
            $templateData
        );
        static::assertSame(
            Response::HTTP_NO_CONTENT,
            $this->getBrowser()->getResponse()->getStatusCode(),
            (string) $this->getBrowser()->getResponse()->getContent()
        );
        return $this->assertTemplate($templateId);
    }
    private function assertTemplate(string $templateId): ServiceBookingTemplateEntity
    {
        /** @var EntityRepositoryInterface $templateRepo */
        $templateRepo = $this->getContainer()->get('swag_service_booking_template.repository');
        $criteria = (new Criteria())
            ->addAssociation('dates');
        /** @var ServiceBookingTemplateEntity|null $template */
        $template = $templateRepo->search($criteria, Context::createDefaultContext())->get($templateId);
        static::assertNotNull($template);
        static::assertSame('service', $template->getType());
        return $template;
    }
}
