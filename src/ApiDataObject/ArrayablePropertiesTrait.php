<?php


namespace didix16\Api\ApiDataObject;

/**
 * Trait ArrayablePropertiesTrait
 * @package didix16\Api\ApiDataObject
 */
trait ArrayablePropertiesTrait
{
    protected $properties = [];

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->properties);
    }

    public function offsetGet($offset)
    {
        return $this->properties[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->properties[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->properties[$offset]);
    }
}