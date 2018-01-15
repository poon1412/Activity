<?php

class Activity extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idActivity;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $ActivityName;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $Detail;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $StartDate;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $EndDate;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $Teacher_idTeacher;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $Location_idLocation;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $Type_idType;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $Yearofeducation_Semester;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $Yearofeducation_Year;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    public $image;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("activityswe_db");
        $this->hasMany('idActivity', 'ActivityHasStudent', 'Activity_idActivity', ['alias' => 'ActivityHasStudent']);
        $this->belongsTo('Location_idLocation', '\Location', 'idLocation', ['alias' => 'Location']);
        $this->belongsTo('Teacher_idTeacher', '\Teacher', 'idTeacher', ['alias' => 'Teacher']);
        $this->belongsTo('Type_idType', '\Type', 'idType', ['alias' => 'Type']);
        $this->belongsTo('Yearofeducation_Semester', '\Yearofeducation', 'Semester', ['alias' => 'Yearofeducation']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'activity';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Activity[]|Activity
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Activity
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
