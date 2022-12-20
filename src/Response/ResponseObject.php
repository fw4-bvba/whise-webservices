<?php

namespace Whise\Response;

use Whise\Exception\ResponseException;

class ResponseObject implements \JsonSerializable
{
	protected $_data = [];
	private $_propertyIndex = [];

	public function __construct(array $data = [])
	{
		unset($data['__type']);

		foreach ($data as $property => &$value) {
			$this->_propertyIndex[strtolower($property)] = $property;

			if (is_array($value)) {
				$this->$property = self::create($value);
			} else if (
				// Check for dates
				is_string($value) &&
				substr($value, 0, 6) === '/Date(' &&
				preg_match('/^\/Date\((\-?\d{9,10})(?:\d{3})([\+\-]\d{4})?\)\/$/', $value, $date)
			) {
				$this->$property = new \DateTime('@' . $date[1]);
				if (!empty($date[2])) {
					$this->$property->setTimezone(new \DateTimeZone($date[2]));
				}
			} else {
				$this->$property = $value;
			}
		}
	}

	public function getData(): array
	{
		return $this->_data;
	}

	public function __get(string $property)
	{
		$property = $this->normalizePropertyName($property);
		return $this->_data[$property] ?? null;
	}

	public function __set(string $property, $value)
	{
		$this->_propertyIndex[strtolower($property)] = $property;
		$this->_data[$property] = $value;
	}

	public function __isset(string $property): bool
	{
		$index = strtolower($property);
		return isset($this->_propertyIndex[$index]);
	}

	public function __unset(string $property)
	{
		$property = $this->normalizePropertyName($property);
		unset($this->_data[$property]);
	}

	public function __debugInfo() {
		return $this->getData();
	}

	protected function normalizePropertyName(string $property): string
	{
		$index = strtolower($property);
		if (empty($this->_propertyIndex[$index])) throw new ResponseException($property . ' is not a valid property of ' . static::class);
		return $this->_propertyIndex[$index];
	}

	/* Static methods */

	public static function create(array $data)
	{
		if (isset($data['__type'])) {
			return new self($data);
		} else {
			$new_data = [];
			foreach ($data as $value) {
				if (is_array($value)) $new_data[] = self::create($value);
				else $new_data[] = $value;
			}
			return $new_data;
		}
	}

	/* JsonSerializable implementation */

    #[\ReturnTypeWillChange]
	public function jsonSerialize()
	{
		return $this->getData();
	}
}
