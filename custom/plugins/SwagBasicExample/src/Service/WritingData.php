// SwagBasicExample/src/Service/WritingData.php
<?php declare(strict_types=1);

namespace SwagBasicExample\Service;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;

class WritingData
{
    /**
     * @var EntityRepositoryInterface
     */
    private $swagExampleRepository;

    /**
     * @var EntityRepositoryInterface
     */

    public function __construct(EntityRepositoryInterface $swagExampleRepository)
    {
        $this->swagExampleRepository=$swagExampleRepository;
    }
}