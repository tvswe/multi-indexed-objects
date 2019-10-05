<?php declare(strict_types=1);

namespace Tvswe\MultiIndexedObjects;

/**
 * Class MultiIndexedObjectContainer
 */
class MultiIndexedObjectContainer implements MultiIndexedObjectContainerInterface
{
    /** @var MultiIndexedObjectInterface[] */
    private array $objects;

    /** @var array */
    private array $indexes;

    /**
     * MultiIndexedObjectContainer constructor.
     * @param MultiIndexedObjectInterface[] $objects
     */
    public function __construct(array $objects = [])
    {
        foreach($objects as $object) {
            $this->add($object);
        }
    }

    /**
     * @inheritDoc
     */
    public function add(MultiIndexedObjectInterface $object): void
    {
        $indexGenerator = $object->getIndexes();

        foreach ($indexGenerator as $indexName => $indexValue) {
            $this->indexes[$indexName][$indexValue] = $object;
        }

        $fqcn = get_class($object);
        $this->objects[$fqcn] = $object;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return $this->objects;
    }

    /**
     * @inheritDoc
     */
    public function getAllOf(string $indexName): array
    {
        return $this->indexes[$indexName];
    }

    /**
     * @inheritDoc
     */
    public function getBy(string $indexName, $indexValue): MultiIndexedObjectInterface
    {
        return $this->indexes[$indexName][$indexValue];
    }
}
