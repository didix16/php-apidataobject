<?php


namespace didix16\Api\ApiDataObject;

use JsonSerializable;

/**
 * Given a source of data, builds that data into an object
 * The ApiDataObject can be accessed as array and thus can be iterated.
 * Class ApiDataObject
 * @package didix16\Api\ApiDataObject
 */
abstract class ApiDataObject implements ApiDataObjectInterface, JsonSerializable
{
    use ArrayablePropertiesTrait,
        IterablePropertiesTrait;

    /**
     * Check if $value is undefined value.
     * inside incoming data
     */
    public static function isUndefined($value): bool
    {
        return $value instanceof UndefinedField;
    }

    /**
     * Data given can be in array or object form.
     * ApiDataObject constructor.
     * @param $data
     * @throws ApiDataObjectException
     */
    public function __construct($data = [])
    {
        if (is_array($data)) {
            $this->properties = $data;
        } else if (is_object($data)) {
            $this->properties = (array) $data;
        } else {
            throw new ApiDataObjectException("The data given is not an array nor object");
        }
    }

    /**
     * Builds an ApiDataObject from json string
     * @param string $json
     * @return static
     * @throws ApiDataObjectException
     */
    public static function fromJson(string $json)
    {
        $data = json_decode($json);
        return new static($data);

    }

    /**
     * Return the property value if set, else return UndefinedField
     * @param $name
     * @return mixed|UndefinedField
     */
    public function &__get($name)
    {
        if (isset($this->properties[$name])){
            $val = &$this->properties[$name];
            return $val;
        }
        $val = new UndefinedField;
        $val2 = &$val;
        return $val2;
    }

    /**
     * Return/Set a property using call syntax
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (empty($arguments)) {

            return $this->__get($name);

        } else {

            return $this->__set($name, $arguments[0]);
        }

    }

    /**
     * Sets a property to this ApiDataObject
     * @param $name
     * @param $value
     * @return $this
     */
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
        return $this;
    }

    /**
     * Object method to get the property insted of using property accesor
     * @param $prop
     * @return mixed|null
     */
    public function get($prop)
    {
        return $this->__get($prop);
    }

    /**
     * Object method to set the property insted of using property accesor
     * @param $prop
     * @param $value
     * @return $this
     */
    public function set($prop, $value)
    {
        return $this->__set($prop, $value);
    }

    /**
     * Returns the properties array of this ApiDataObject
     * @return array
     */
    public function all(){

        return $this->properties;
    }

    /**
     * Returns the properties of this object to be json serialized using json_encode() built-in function
     */
    public function jsonSerialize()
    {
        return $this->properties;
    }


}