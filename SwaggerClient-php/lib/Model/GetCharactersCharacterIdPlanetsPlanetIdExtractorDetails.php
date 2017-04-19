<?php
/**
 * GetCharactersCharacterIdPlanetsPlanetIdExtractorDetails
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * EVE Swagger Interface
 *
 * An OpenAPI for EVE Online
 *
 * OpenAPI spec version: 0.4.2
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;

/**
 * GetCharactersCharacterIdPlanetsPlanetIdExtractorDetails Class Doc Comment
 *
 * @category    Class
 * @description extractor_details object
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class GetCharactersCharacterIdPlanetsPlanetIdExtractorDetails implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'get_characters_character_id_planets_planet_id_extractor_details';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cycle_time' => 'int',
        'head_radius' => 'float',
        'heads' => '\Swagger\Client\Model\GetCharactersCharacterIdPlanetsPlanetIdHead[]',
        'product_type_id' => 'int',
        'qty_per_cycle' => 'int'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'cycle_time' => 'cycle_time',
        'head_radius' => 'head_radius',
        'heads' => 'heads',
        'product_type_id' => 'product_type_id',
        'qty_per_cycle' => 'qty_per_cycle'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'cycle_time' => 'setCycleTime',
        'head_radius' => 'setHeadRadius',
        'heads' => 'setHeads',
        'product_type_id' => 'setProductTypeId',
        'qty_per_cycle' => 'setQtyPerCycle'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'cycle_time' => 'getCycleTime',
        'head_radius' => 'getHeadRadius',
        'heads' => 'getHeads',
        'product_type_id' => 'getProductTypeId',
        'qty_per_cycle' => 'getQtyPerCycle'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['cycle_time'] = isset($data['cycle_time']) ? $data['cycle_time'] : null;
        $this->container['head_radius'] = isset($data['head_radius']) ? $data['head_radius'] : null;
        $this->container['heads'] = isset($data['heads']) ? $data['heads'] : null;
        $this->container['product_type_id'] = isset($data['product_type_id']) ? $data['product_type_id'] : null;
        $this->container['qty_per_cycle'] = isset($data['qty_per_cycle']) ? $data['qty_per_cycle'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if ($this->container['heads'] === null) {
            $invalid_properties[] = "'heads' can't be null";
        }
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['heads'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets cycle_time
     * @return int
     */
    public function getCycleTime()
    {
        return $this->container['cycle_time'];
    }

    /**
     * Sets cycle_time
     * @param int $cycle_time in seconds
     * @return $this
     */
    public function setCycleTime($cycle_time)
    {
        $this->container['cycle_time'] = $cycle_time;

        return $this;
    }

    /**
     * Gets head_radius
     * @return float
     */
    public function getHeadRadius()
    {
        return $this->container['head_radius'];
    }

    /**
     * Sets head_radius
     * @param float $head_radius head_radius number
     * @return $this
     */
    public function setHeadRadius($head_radius)
    {
        $this->container['head_radius'] = $head_radius;

        return $this;
    }

    /**
     * Gets heads
     * @return \Swagger\Client\Model\GetCharactersCharacterIdPlanetsPlanetIdHead[]
     */
    public function getHeads()
    {
        return $this->container['heads'];
    }

    /**
     * Sets heads
     * @param \Swagger\Client\Model\GetCharactersCharacterIdPlanetsPlanetIdHead[] $heads heads array
     * @return $this
     */
    public function setHeads($heads)
    {
        $this->container['heads'] = $heads;

        return $this;
    }

    /**
     * Gets product_type_id
     * @return int
     */
    public function getProductTypeId()
    {
        return $this->container['product_type_id'];
    }

    /**
     * Sets product_type_id
     * @param int $product_type_id product_type_id integer
     * @return $this
     */
    public function setProductTypeId($product_type_id)
    {
        $this->container['product_type_id'] = $product_type_id;

        return $this;
    }

    /**
     * Gets qty_per_cycle
     * @return int
     */
    public function getQtyPerCycle()
    {
        return $this->container['qty_per_cycle'];
    }

    /**
     * Sets qty_per_cycle
     * @param int $qty_per_cycle qty_per_cycle integer
     * @return $this
     */
    public function setQtyPerCycle($qty_per_cycle)
    {
        $this->container['qty_per_cycle'] = $qty_per_cycle;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}


