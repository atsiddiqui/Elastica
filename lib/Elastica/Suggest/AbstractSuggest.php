<?php

namespace Elastica\Suggest;


use Elastica\Param;

/**
 * Class AbstractSuggestion
 * @package Elastica\Suggest
 */
abstract class AbstractSuggest extends Param
{
    /**
     * @var string the name of this suggestion
     */
    protected $_name;

    /**
     * @var string the text for this suggestion
     */
    protected $_text;

    /**
     * @param string $name
     * @param string $field
     */
    public function __construct($name, $field)
    {
        $this->_name = $name;
        $this->setField($field);
    }

    /**
     * Suggest text must be set either globally or per suggestion
     * @param string $text
     * @return \Elastica\Suggest\AbstractSuggest
     */
    public function setText($text)
    {
        $this->_text = $text;
        return $this;
    }

    /**
     * @param string $field
     * @return \Elastica\Suggest\AbstractSuggest
     */
    public function setField($field)
    {
        return $this->setParam("field", $field);
    }

    /**
     * @param int $size
     * @return \Elastica\Suggest\AbstractSuggest
     */
    public function setSize($size)
    {
        return $this->setParam("size", $size);
    }

    /**
     * @param int $size maximum number of suggestions to be retrieved from each shard
     * @return \Elastica\Suggest\AbstractSuggest
     */
    public function setShardSize($size)
    {
        return $this->setParam("shard_size", $size);
    }

    /**
     * Retrieve the name of this suggestion
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();
        if (isset($this->_text)) {
            $array['text'] = $this->_text;
        }
        return $array;
    }
}