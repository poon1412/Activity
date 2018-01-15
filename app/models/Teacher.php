<?php

class Teacher extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idTeacher;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $Title;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $FirstName;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $LastName;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    public $Password;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $status;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=true)
     */
    public $image;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("activityswe_db");
        $this->hasMany('idTeacher', 'Activity', 'Teacher_idTeacher', ['alias' => 'Activity']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'teacher';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Teacher[]|Teacher
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Teacher
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
