<?php declare(strict_types=1);

namespace Tvswe\MultiIndexedObjects;

/**
 * Class MultiIndexedObjectContainer
 */
class MultiIndexedObjectContainer
{
    /** @var MultiIndexedObjectInterface[] */
    private array $indexes;

    /**
     * MultiIndexedObjectContainer constructor.
     * @param array $objects
     */
    public function __construct(array $objects)
    {
        foreach($objects as $object) {
            $this->add($object);
        }
    }

    /**
     * @param MultiIndexedObjectInterface $object
     */
    public function add(MultiIndexedObjectInterface $object): void
    {
        $indexGenerator = $object->getIndexes();

        foreach ($indexGenerator as $indexName => $indexValue) {
            $this->indexes[$indexName][$indexValue] = $object;
        }
    }

    /**
     * @param string $indexName
     * @param int|string $indexValue
     * @return MultiIndexedObjectInterface
     */
    public function getBy(string $indexName, $indexValue): MultiIndexedObjectInterface
    {
        return $this->indexes[$indexName][$indexValue];
    }
}
