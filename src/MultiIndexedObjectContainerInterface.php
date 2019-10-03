<?php declare(strict_types=1);

namespace Tvswe\MultiIndexedObjects;

interface MultiIndexedObjectContainerInterface
{
    /**
     * @param MultiIndexedObjectInterface $object
     */
    public function add(MultiIndexedObjectInterface $object): void;

    /**
     * @param string $indexName
     * @param int|string $indexValue
     * @return MultiIndexedObjectInterface
     */
    public function getBy(string $indexName, $indexValue): MultiIndexedObjectInterface;
}
