<?php

namespace GamingEngine\Dictionary\Tests;

use GamingEngine\Dictionary\Dictionary;
use GamingEngine\Dictionary\DictionaryIterator;
use PHPUnit\Framework\TestCase;

class DictionaryIteratorTest extends TestCase
{
    public function testIterator()
    {
        $object1 = new \stdClass();
        $object2 = new \stdClass();
        $object3 = new \stdClass();

        $d = new Dictionary();
        $d[4] = $object1;
        $d['abc'] = $object2;
        $d[$object3] = $this;

        $it = new DictionaryIterator($d);

        $it->rewind();
        $this->assertSame(4, $it->key());
        $this->assertSame($object1, $it->current());
        $this->assertTrue($it->valid());

        $it->next();
        $this->assertSame('abc', $it->key());
        $this->assertSame($object2, $it->current());
        $this->assertTrue($it->valid());

        $it->next();
        $this->assertSame($object3, $it->key());
        $this->assertSame($this, $it->current());
        $this->assertTrue($it->valid());

        $it->next();
        $this->assertFalse($it->valid());

        $it->rewind();
        $this->assertTrue($it->valid());
    }
}