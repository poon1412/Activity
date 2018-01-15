<?php

class ActivityHaveYear extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $activity_have_year_idActivity;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $activity_have_year_year;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("activityswe_db");
        $this->belongsTo('activity_have_year_idActivity', '\Activity', 'idActivity', ['alias' => 'Activity']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'activity_have_year';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ActivityHaveYear[]|ActivityHaveYear
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ActivityHaveYear
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
