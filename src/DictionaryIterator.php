<?php

namespace GamingEngine\Dictionary;

use Iterator;

/**
 * Iterator for Dictionary collection
 */
class DictionaryIterator implements Iterator
{
    /**
     * @var array
     */
    private array $data = [];

    /**
     * @var string[]
     */
    private array $keys = [];

    /**
     * DictionaryIterator constructor.
     * @param Dictionary $dictionary
     */
    public function __construct(Dictionary $dictionary)
    {
        $this->data = $dictionary->values();
        $this->keys = $dictionary->keys();
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        next($this->data);
        next($this->keys);
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return current($this->keys);
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return key($this->data) !== null;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        reset($this->data);
        reset($this->keys);
    }
}