<?php declare(strict_types=1);

namespace Tvswe\MultiIndexedObjects;

/**
 * Interface MultiIndexedObjectInterface
 * @package Tvswe\MultiIndexedObjects
 */
interface MultiIndexedObjectInterface
{
    /**
     * @return \Generator
     */
    public function getIndexes(): \Generator;
}
