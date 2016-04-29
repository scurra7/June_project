<?php
/**
 * Created by PhpStorm.
 * action: Darren Cosgrave
 * Date: 14/04/2016
 * Time: 08:40
 */

namespace Itb;

use Itb\Member;

class memberTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testGetId()
    {
        // Arrange
        $member = new Member();
        $member->setId(1);
        $expectedResult = 1;

        // Act
        $result = $member->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /*
     * checks the members currentBeltGrade
     */
   public function testGetCurrentBeltGrade()
   {
       // Arrange
        $member = new Member();
       $member->setCurrentBeltGrade("Belt");
       $expectedResult = "Belt";

        // Act
        $result = $member->getCurrentBeltGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);
   }
    /*
     * checks the member currentStatus
     */
        public function testGetCurrentStatus()
        {
            // Arrange
            $member = new Member();
            $member->setCurrentStatus("Belt");
            $expectedResult = "Belt";

            // Act
            $result = $member->getCurrentStatus();

            // Assert
            $this->assertEquals($expectedResult, $result);
        }
        /*
         * checks member nextGrade
         */
          public function testGetNextGrade()
          {
              // Arrange
              $member = new Member();
              $member->setNextGrade("Belt");
              $expectedResult = "Belt";

              // Act
              $result = $member->getNextGrade();

              // Assert
              $this->assertEquals($expectedResult, $result);
          }
        /*
         * checks member nextBeltGradeSyllabus
         */
              public function testGetNextBeltGradeSyllabus()
              {
                  // Arrange
                  $member = new Member();
                  $member->setNextBeltGradeSyllabus("Belt");
                  $expectedResult = "Belt";

                  // Act
                  $result = $member->getNextBeltGradeSyllabus();

                  // Assert
                  $this->assertEquals($expectedResult, $result);
              }

    public function testGetRequireStatus()
    {
        // Arrange
                     $member = new Member();
        $member->setRequireStatus("Belt");
        $expectedResult = "Belt";

                     // Act
                     $result = $member->GetRequireStatus();

                     // Assert
                     $this->assertEquals($expectedResult, $result);
    }

    public function testGetName()
    {
        // Arrange
                         $member = new Member();
        $member->setName("Belt");
        $expectedResult = "Belt";

                         // Act
                         $result = $member->getName();

                         // Assert
                         $this->assertEquals($expectedResult, $result);
    }
}
