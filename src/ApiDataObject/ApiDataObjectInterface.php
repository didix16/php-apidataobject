<?php


namespace didix16\Api\ApiDataObject;

/**
 * Interface ApiDataObjectInterface
 * @package didix16\Api\ApiDataObject
 */
interface ApiDataObjectInterface extends \ArrayAccess, \Iterator
{

    /**
     * Builds an ApiDataObjectInterface from json string
     * @param string $json
     * @return static
     * @throws ApiDataObjectException
     */
    public static function fromJson(string $json);
    /**
     * Return the property value if set, else return null
     * @param $name
     * @return mixed|null
     */
    public function &__get($name);
    /**
     * Return/Set a property using call syntax
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments);
    /**
     * Sets a property to this ApiDataObjectInterface
     * @param $name
     * @param $value
     * @return $this
     */
    public function __set($name, $value);
    /**
     * Object method to get the property insted of using property accesor
     * @param $prop
     * @return mixed|null
     */
    public function get($prop);
    /**
     * Object method to set the property insted of using property accesor
     * @param $prop
     * @param $value
     * @return $this
     */
    public function set($prop, $value);
    /**
     * Returns the properties array of this ApiDataObjectInterface
     * @return array
     */
    public function all();
}