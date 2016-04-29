<?php
/**
 * Student Class
 * Created by PhpStorm.
 * User: Steve Curran
 * Date: 08/04/2016
 * Time: 14:19
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * for student id, surname, first name,
 * date student joined club,
 * last grading and current standing
 * Class Student
 * Class Student
 * @package Itb
 */
class Student extends DatabaseTable
{

    /**
     * get student id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set student id
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * get student surname
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * set student surname
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * get student first name
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * set student first name
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * get date joined club
     * @return mixed
     */
    public function getJoinedClub()
    {
        return $this->joinedClub;
    }

    /**
     * set date student joined club
     * @param mixed $joinedClub
     */
    public function setJoinedClub($joinedClub)
    {
        $this->joinedClub = $joinedClub;
    }

    /**
     * get student last grading
     * @return mixed
     */
    public function getLastGrading()
    {
        return $this->lastGrading;
    }

    /**
     * set student last grading
     * @param mixed $lastGrading
     */
    public function setLastGrading($lastGrading)
    {
        $this->lastGrading = $lastGrading;
    }

    /**
     * Get current grade
     * @return mixed
     */
    public function getCurrentGrade()
    {
        return $this->currentGrade;
    }

    /**
     * Set current grade
     * @param $currentGrade
     */
    public function setCurrentGrade($currentGrade)
    {
        $this->currentGrade = $currentGrade;
    }
}
