<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Tvswe\MultiIndexedObjects\MultiIndexedObjectContainer;
use Tvswe\MultiIndexedObjects\MultiIndexedObjectInterface;

final class MultiIndexedObjectTest extends TestCase
{
    public function testGetMultiIndexedObjects(): void
    {
        $a = new class implements MultiIndexedObjectInterface {
            public function getIndexes(): \Generator
            {
                yield 'id' => 1;
                yield 'name' => 'a';
            }
        };

        $b = new class implements MultiIndexedObjectInterface {
            public function getIndexes(): \Generator
            {
                yield 'id' => 2;
                yield 'name' => 'b';
            }
        };

        $container = new MultiIndexedObjectContainer([$a]);
        $container->add($b);

        $a2 = $container->getBy('id', 1);
        $this->assertSame($a, $a2);

        $b2 = $container->getBy('name', 'b');
        $this->assertSame($b, $b2);
    }
}
