<?php

class Location extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idLocation;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=false)
     */
    public $LocationName;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $room;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("activityswe_db");
        $this->hasMany('idLocation', 'Activity', 'Location_idLocation', ['alias' => 'Activity']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'location';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Location[]|Location
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Location
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
