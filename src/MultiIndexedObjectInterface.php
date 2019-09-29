<?php declare(strict_types=1);

namespace Tvswe\MultiIndexedObjects;

interface MultiIndexedObjectInterface
{
    public function getIndexes(): \Generator;
}
