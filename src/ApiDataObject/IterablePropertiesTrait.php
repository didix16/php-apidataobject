<?php


namespace didix16\Api\ApiDataObject;


/**
 * Trait IterablePropertiesTrait
 * @package didix16\Api\ApiDataObject
 */
trait IterablePropertiesTrait
{

    protected $properties = [];

    public function current()
    {
        return current($this->properties);
    }

    public function next()
    {
        return next($this->properties);
    }

    public function key()
    {
        return key($this->properties);
    }

    public function valid()
    {
        return current($this->properties) !== FALSE;
    }

    public function rewind()
    {
        return reset($this->properties);
    }
}