<?php
/**
 * Created by PhpStorm.
 * User: Steve Curran
 * Date: 23/03/2016
 * Time: 15:02
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * class for members
 * Class Member
 * @package Itb
 *
 */
class Member extends DatabaseTable
{
    /**
     * holds member id
     * @var int
     *
     */
    private $id;

    /**
     * stores member current belt grade
     * @var
     * hold
     */
    private $currentBeltGrade;

    /**
     * stores current status
     * @var
     */
    private $currentStatus;

    /**
     * holds member next grade
     * @var
     */
    private $nextGrade;

    /**
     * holds member next belt syllabus
     * @var
     */
    private $nextBeltGradeSyllabus;

    /**
     * holds memberrequired status
     * @var
     */
    private $requireStatus;

    /**
     * holds member name
     * @var
     */
    private $name;

    /**
     * get student Name
     * @return mixed
     *
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * set student Name
     * @param mixed $name
     *
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * get student Id
     * @return mixed
     *
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * set student Name
     * @param mixed $id
     *
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * get student Current Belt Grade
     * @return mixed
     *
     */
    public function getCurrentBeltGrade()
    {
        return $this->currentBeltGrade;
    }

    /**
     * set current grade
     * @param $currentBeltGrade
     */
    public function setCurrentBeltGrade($currentBeltGrade)
    {
        $this->currentBeltGrade = $currentBeltGrade;
    }

    /**
     * get student Current Status
     * @return mixed
     *
     */
    public function getCurrentStatus()
    {
        return $this->currentStatus;
    }

    /**
     * set student Current Status
     * @param mixed $currentStatus
     *  set student Current Status
     */
    public function setCurrentStatus($currentStatus)
    {
        $this->currentStatus = $currentStatus;
    }

    /**
     * get student Next Grade
     * @return mixed
     * get student Next Grade
     */
    public function getNextGrade()
    {
        return $this->nextGrade;
    }

    /**
     * set student Next Grade
     * @param mixed $nextGrad
     * set student Next Grade
     */
    public function setNextGrade($nextGrade)
    {
        $this->nextGrade = $nextGrade;
    }

    /**
     * get student Next Belt Grade Syllabus
     * @return mixed
     * get student Next Belt Grade Syllabus
     */
    public function getNextBeltGradeSyllabus()
    {
        return $this->nextBeltGradeSyllabus;
    }

    /**
     * set student Next Belt Grade Syllabus
     * @param mixed $nextBeltGradeSyllabus
     *
     */
    public function setNextBeltGradeSyllabus($nextBeltGradeSyllabus)
    {
        $this->nextBeltGradeSyllabus = $nextBeltGradeSyllabus;
    }

    /**
     * get student Required Status
     * @return mixed
     *
     */
    public function getRequireStatus()
    {
        return $this->requireStatus;
    }

    /**
     * set student Required Status
     * @param mixed $requireStatus
     *
     */
    public function setRequireStatus($requireStatus)
    {
        $this->requireStatus = $requireStatus;
    }
}
