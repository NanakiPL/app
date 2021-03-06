<?php
/**
 * Events
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * on-site-notifications
 *
 * No descripton provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: 0.1.0-SNAPSHOT
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\OnSiteNotifications\Models;

use \ArrayAccess;

/**
 * Events Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     Swagger\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Events implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Events';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = array(
        'total' => 'int',
        'total_unique_actors' => 'int',
        'latest_actors' => '\Swagger\Client\OnSiteNotifications\Models\UserInfo[]',
        'latest_event' => '\Swagger\Client\OnSiteNotifications\Models\LatestEvent'
    );

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = array(
        'total' => 'total',
        'total_unique_actors' => 'totalUniqueActors',
        'latest_actors' => 'latestActors',
        'latest_event' => 'latestEvent'
    );

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = array(
        'total' => 'setTotal',
        'total_unique_actors' => 'setTotalUniqueActors',
        'latest_actors' => 'setLatestActors',
        'latest_event' => 'setLatestEvent'
    );

    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = array(
        'total' => 'getTotal',
        'total_unique_actors' => 'getTotalUniqueActors',
        'latest_actors' => 'getLatestActors',
        'latest_event' => 'getLatestEvent'
    );

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = array();

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['total'] = isset($data['total']) ? $data['total'] : null;
        $this->container['total_unique_actors'] = isset($data['total_unique_actors']) ? $data['total_unique_actors'] : null;
        $this->container['latest_actors'] = isset($data['latest_actors']) ? $data['latest_actors'] : null;
        $this->container['latest_event'] = isset($data['latest_event']) ? $data['latest_event'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        return true;
    }


    /**
     * Gets total
     * @return int
     */
    public function getTotal()
    {
        return $this->container['total'];
    }

    /**
     * Sets total
     * @param int $total
     * @return $this
     */
    public function setTotal($total)
    {
        $this->container['total'] = $total;

        return $this;
    }

    /**
     * Gets total_unique_actors
     * @return int
     */
    public function getTotalUniqueActors()
    {
        return $this->container['total_unique_actors'];
    }

    /**
     * Sets total_unique_actors
     * @param int $total_unique_actors
     * @return $this
     */
    public function setTotalUniqueActors($total_unique_actors)
    {
        $this->container['total_unique_actors'] = $total_unique_actors;

        return $this;
    }

    /**
     * Gets latest_actors
     * @return \Swagger\Client\OnSiteNotifications\Models\UserInfo[]
     */
    public function getLatestActors()
    {
        return $this->container['latest_actors'];
    }

    /**
     * Sets latest_actors
     * @param \Swagger\Client\OnSiteNotifications\Models\UserInfo[] $latest_actors
     * @return $this
     */
    public function setLatestActors($latest_actors)
    {
        $this->container['latest_actors'] = $latest_actors;

        return $this;
    }

    /**
     * Gets latest_event
     * @return \Swagger\Client\OnSiteNotifications\Models\LatestEvent
     */
    public function getLatestEvent()
    {
        return $this->container['latest_event'];
    }

    /**
     * Sets latest_event
     * @param \Swagger\Client\OnSiteNotifications\Models\LatestEvent $latest_event
     * @return $this
     */
    public function setLatestEvent($latest_event)
    {
        $this->container['latest_event'] = $latest_event;

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


