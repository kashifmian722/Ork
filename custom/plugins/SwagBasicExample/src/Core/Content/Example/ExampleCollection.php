<?php declare(strict_types=1);

namespace SwagBasicExample\Core\Content\Bundle;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void               add(ExampleEntity $entity)
 * @method void               set(string $key, ExampleEntity $entity)
 * @method ExampleEntity[]    getIterator()
 * @method ExampleEntity[]    getElements()
 * @method ExampleEntity|null get(string $key)
 * @method ExampleEntity|null first()
 * @method ExampleEntity|null last()
 */
class ExampleCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ExampleEntity::class;
    }
}