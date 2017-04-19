<?php
/**
 * GetCharactersCharacterIdChatChannels200Ok
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
 * GetCharactersCharacterIdChatChannels200Ok Class Doc Comment
 *
 * @category    Class
 * @description 200 ok object
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class GetCharactersCharacterIdChatChannels200Ok implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'get_characters_character_id_chat_channels_200_ok';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'allowed' => '\Swagger\Client\Model\GetCharactersCharacterIdChatChannelsAllowed[]',
        'blocked' => '\Swagger\Client\Model\GetCharactersCharacterIdChatChannelsBlocked[]',
        'channel_id' => 'int',
        'comparison_key' => 'string',
        'has_password' => 'bool',
        'motd' => 'string',
        'muted' => '\Swagger\Client\Model\GetCharactersCharacterIdChatChannelsMuted[]',
        'name' => 'string',
        'operators' => '\Swagger\Client\Model\GetCharactersCharacterIdChatChannelsOperator[]',
        'owner_id' => 'int'
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
        'allowed' => 'allowed',
        'blocked' => 'blocked',
        'channel_id' => 'channel_id',
        'comparison_key' => 'comparison_key',
        'has_password' => 'has_password',
        'motd' => 'motd',
        'muted' => 'muted',
        'name' => 'name',
        'operators' => 'operators',
        'owner_id' => 'owner_id'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'allowed' => 'setAllowed',
        'blocked' => 'setBlocked',
        'channel_id' => 'setChannelId',
        'comparison_key' => 'setComparisonKey',
        'has_password' => 'setHasPassword',
        'motd' => 'setMotd',
        'muted' => 'setMuted',
        'name' => 'setName',
        'operators' => 'setOperators',
        'owner_id' => 'setOwnerId'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'allowed' => 'getAllowed',
        'blocked' => 'getBlocked',
        'channel_id' => 'getChannelId',
        'comparison_key' => 'getComparisonKey',
        'has_password' => 'getHasPassword',
        'motd' => 'getMotd',
        'muted' => 'getMuted',
        'name' => 'getName',
        'operators' => 'getOperators',
        'owner_id' => 'getOwnerId'
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
        $this->container['allowed'] = isset($data['allowed']) ? $data['allowed'] : null;
        $this->container['blocked'] = isset($data['blocked']) ? $data['blocked'] : null;
        $this->container['channel_id'] = isset($data['channel_id']) ? $data['channel_id'] : null;
        $this->container['comparison_key'] = isset($data['comparison_key']) ? $data['comparison_key'] : null;
        $this->container['has_password'] = isset($data['has_password']) ? $data['has_password'] : null;
        $this->container['motd'] = isset($data['motd']) ? $data['motd'] : null;
        $this->container['muted'] = isset($data['muted']) ? $data['muted'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['operators'] = isset($data['operators']) ? $data['operators'] : null;
        $this->container['owner_id'] = isset($data['owner_id']) ? $data['owner_id'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if ($this->container['allowed'] === null) {
            $invalid_properties[] = "'allowed' can't be null";
        }
        if ($this->container['blocked'] === null) {
            $invalid_properties[] = "'blocked' can't be null";
        }
        if ($this->container['channel_id'] === null) {
            $invalid_properties[] = "'channel_id' can't be null";
        }
        if ($this->container['comparison_key'] === null) {
            $invalid_properties[] = "'comparison_key' can't be null";
        }
        if ($this->container['has_password'] === null) {
            $invalid_properties[] = "'has_password' can't be null";
        }
        if ($this->container['motd'] === null) {
            $invalid_properties[] = "'motd' can't be null";
        }
        if ($this->container['muted'] === null) {
            $invalid_properties[] = "'muted' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalid_properties[] = "'name' can't be null";
        }
        if ($this->container['operators'] === null) {
            $invalid_properties[] = "'operators' can't be null";
        }
        if ($this->container['owner_id'] === null) {
            $invalid_properties[] = "'owner_id' can't be null";
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

        if ($this->container['allowed'] === null) {
            return false;
        }
        if ($this->container['blocked'] === null) {
            return false;
        }
        if ($this->container['channel_id'] === null) {
            return false;
        }
        if ($this->container['comparison_key'] === null) {
            return false;
        }
        if ($this->container['has_password'] === null) {
            return false;
        }
        if ($this->container['motd'] === null) {
            return false;
        }
        if ($this->container['muted'] === null) {
            return false;
        }
        if ($this->container['name'] === null) {
            return false;
        }
        if ($this->container['operators'] === null) {
            return false;
        }
        if ($this->container['owner_id'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets allowed
     * @return \Swagger\Client\Model\GetCharactersCharacterIdChatChannelsAllowed[]
     */
    public function getAllowed()
    {
        return $this->container['allowed'];
    }

    /**
     * Sets allowed
     * @param \Swagger\Client\Model\GetCharactersCharacterIdChatChannelsAllowed[] $allowed allowed array
     * @return $this
     */
    public function setAllowed($allowed)
    {
        $this->container['allowed'] = $allowed;

        return $this;
    }

    /**
     * Gets blocked
     * @return \Swagger\Client\Model\GetCharactersCharacterIdChatChannelsBlocked[]
     */
    public function getBlocked()
    {
        return $this->container['blocked'];
    }

    /**
     * Sets blocked
     * @param \Swagger\Client\Model\GetCharactersCharacterIdChatChannelsBlocked[] $blocked blocked array
     * @return $this
     */
    public function setBlocked($blocked)
    {
        $this->container['blocked'] = $blocked;

        return $this;
    }

    /**
     * Gets channel_id
     * @return int
     */
    public function getChannelId()
    {
        return $this->container['channel_id'];
    }

    /**
     * Sets channel_id
     * @param int $channel_id Unique channel ID. Always negative for player-created channels. Permanent (CCP created) channels have a positive ID, but don't appear in the API
     * @return $this
     */
    public function setChannelId($channel_id)
    {
        $this->container['channel_id'] = $channel_id;

        return $this;
    }

    /**
     * Gets comparison_key
     * @return string
     */
    public function getComparisonKey()
    {
        return $this->container['comparison_key'];
    }

    /**
     * Sets comparison_key
     * @param string $comparison_key Normalized, unique string used to compare channel names
     * @return $this
     */
    public function setComparisonKey($comparison_key)
    {
        $this->container['comparison_key'] = $comparison_key;

        return $this;
    }

    /**
     * Gets has_password
     * @return bool
     */
    public function getHasPassword()
    {
        return $this->container['has_password'];
    }

    /**
     * Sets has_password
     * @param bool $has_password Whether this is a password protected channel
     * @return $this
     */
    public function setHasPassword($has_password)
    {
        $this->container['has_password'] = $has_password;

        return $this;
    }

    /**
     * Gets motd
     * @return string
     */
    public function getMotd()
    {
        return $this->container['motd'];
    }

    /**
     * Sets motd
     * @param string $motd Message of the day for this channel
     * @return $this
     */
    public function setMotd($motd)
    {
        $this->container['motd'] = $motd;

        return $this;
    }

    /**
     * Gets muted
     * @return \Swagger\Client\Model\GetCharactersCharacterIdChatChannelsMuted[]
     */
    public function getMuted()
    {
        return $this->container['muted'];
    }

    /**
     * Sets muted
     * @param \Swagger\Client\Model\GetCharactersCharacterIdChatChannelsMuted[] $muted muted array
     * @return $this
     */
    public function setMuted($muted)
    {
        $this->container['muted'] = $muted;

        return $this;
    }

    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name Displayed name of channel
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets operators
     * @return \Swagger\Client\Model\GetCharactersCharacterIdChatChannelsOperator[]
     */
    public function getOperators()
    {
        return $this->container['operators'];
    }

    /**
     * Sets operators
     * @param \Swagger\Client\Model\GetCharactersCharacterIdChatChannelsOperator[] $operators operators array
     * @return $this
     */
    public function setOperators($operators)
    {
        $this->container['operators'] = $operators;

        return $this;
    }

    /**
     * Gets owner_id
     * @return int
     */
    public function getOwnerId()
    {
        return $this->container['owner_id'];
    }

    /**
     * Sets owner_id
     * @param int $owner_id owner_id integer
     * @return $this
     */
    public function setOwnerId($owner_id)
    {
        $this->container['owner_id'] = $owner_id;

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


