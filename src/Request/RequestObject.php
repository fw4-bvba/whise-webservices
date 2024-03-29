<?php

namespace Whise\Request;

use Whise\DateEncoder;
use Whise\Exception\{RequestException, WrongParamTypeException};

abstract class RequestObject implements \JsonSerializable
{
    protected $_data = [];

    private static $_propertyDefinitions = [];
    private static $_propertyIndex = [];

    public function __construct(array $properties = [])
    {
        $this->initStatic();
        foreach ($properties as $name => $value) {
            $this->$name = $value;
        }
    }

    public function &__get(string $property)
    {
        $property = self::normalizePropertyName($property);
        if (!isset($this->_data[$property])) {
            $null = null;
            return $null;
        } else if (is_array($this->_data[$property]) || is_object($this->_data[$property])) {
            return $this->_data[$property];
        } else {
            $result = $this->_data[$property];
            return $result;
        }
    }

    public function __set(string $property, $value)
    {
        $property = self::normalizePropertyName($property);
        if (self::propertyDefinitionIsArray($property)) {
            if (!is_array($value) && !(is_object($value) && ($value instanceof \Traversable))) {
                throw new WrongParamTypeException(static::class, $property, 'array', $value);
            }
            $this->_data[$property] = [];
            foreach ($value as $subvalue) {
                $this->_data[$property][] = self::validateParameter($property, $subvalue);
            }
        } else {
            $this->_data[$property] = self::validateParameter($property, $value);
        }
    }

    public function __isset(string $property): bool
    {
        $property = self::normalizePropertyName($property);
        return isset($this->_data[$property]);
    }

    public function __unset(string $property)
    {
        $property = self::normalizePropertyName($property);
        unset($this->_data[$property]);
    }

    public function __debugInfo(): array
    {
        return $this->_data;
    }

    public function add(string $property, $value, ?string $unique_column = null)
    {
        $property = self::normalizePropertyName($property);
        $value = self::validateParameter($property, $value);
        if (!self::propertyDefinitionIsArray($property)) throw new RequestException('Unable to append value to ' . $property . ': not an array');
        if (!isset($this->_data[$property])) $this->_data[$property] = [];
        if (isset($unique_column)) {
            if (!$value instanceof self) throw new RequestException('Unable to append value to ' . $property . ': value is not a RequestObject or array');
            $unique_column = $value::normalizePropertyName($unique_column);
            foreach ($this->_data[$property] as &$row) {
                if ($row->$unique_column == $value->$unique_column) {
                    $row = $value;
                    return;
                }
            }
        }
        $this->_data[$property][] = $value;
    }

    public function getData(): array
    {
        $data = [];
        foreach (self::getCachedPropertyDefinitions() as $name => $type) {
            if (isset($this->_data[$name])) $data[$name] = $this->_data[$name];
        }
        return $data;
    }

    /* Static methods */

    protected static function initStatic()
    {
        if (empty(self::$_propertyDefinitions[static::class])) {
            self::$_propertyDefinitions[static::class] = static::getPropertyDefinitions();
            self::$_propertyIndex[static::class] = [];
            foreach (self::$_propertyDefinitions[static::class] as $name => $type) {
                self::$_propertyIndex[static::class][strtolower($name)]  = $name;
            }
        }
    }

    protected static function normalizePropertyName(string $property): string
    {
        $index = strtolower($property);
        if (empty(self::$_propertyIndex[static::class][$index])) throw new RequestException($property . ' is not a valid parameter for ' . static::class);
        return self::$_propertyIndex[static::class][$index];
    }

    protected static function getCachedPropertyDefinitions(): array
    {
        return self::$_propertyDefinitions[static::class] ?? [];
    }

    protected static function getPropertyDefinitions(): array
    {
        return static::PROPERTIES;
    }

    protected static function getPropertyDefinition(string $property): string
    {
        if (self::propertyDefinitionIsArray($property)) return self::$_propertyDefinitions[static::class][$property][0];
        else return self::$_propertyDefinitions[static::class][$property];
    }

    protected static function propertyDefinitionIsArray(string $property): bool
    {
        return is_array(self::$_propertyDefinitions[static::class][$property]);
    }

    protected static function validateParameter(string $property, $value)
    {
        if (is_null($value)) return null;
        $definition = self::getPropertyDefinition($property);
        switch ($definition) {
            case 'integer':
                $value = intval($value);
                break;
            case 'float':
                $value = floatval($value);
                break;
            case 'numeric':
                if (!is_int($value) && !is_float($value)) {
                    if (is_string($value)) {
                        if (strlen(trim($value)) === 0) $value = null;
                        else if (strval(intval($value)) === $value) $value = intval($value);
                        else $value = floatval($value);
                    } else {
                        $value = intval($value);
                    }
                }
                break;
            case 'string':
                $value = strval($value);
                break;
            case 'boolean':
                $value = !!$value;
                break;
            case 'DateTime':
                if (is_int($value)) $value = new \DateTime('@' . $value);
                else if (!$value instanceof \DateTime && !is_string($value)) $value = null;
                break;
            default:
                if (is_array($value)) $value = new $definition($value);
                else if (!$value instanceof $definition) $value = null;
        }
        return $value;
    }

    /* JsonSerializable implementation */

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        $data = [];
        foreach (self::getCachedPropertyDefinitions() as $name => $type) {
            if (isset($this->_data[$name])) {
                if (self::propertyDefinitionIsArray($name)) {
                    $data[$name] = [];
                    foreach ($this->_data[$name] as $value) {
                        if ($value instanceof \DateTime) $data[$name][] = DateEncoder::encode($value);
                        else $data[$name][] = $value;
                    }
                } else if ($this->_data[$name] instanceof \DateTime) {
                    $data[$name] = DateEncoder::encode($this->_data[$name]);
                } else {
                    $data[$name] = $this->_data[$name];
                }
            }
        }
        return $data;
    }
}
