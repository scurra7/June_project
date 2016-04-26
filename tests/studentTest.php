<?php
/**
 * Created by PhpStorm.
 * action: Darren Cosgrave
 * Date: 14/04/2016
 * Time: 08:40
 */

namespace Itb;
use Itb\Student;


class studentTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $student = new Student();
        $student->setId(1);
        $expectedResult = 1;

        // Act
        $result = $student->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    
   public function testGetSurname()
    {
        // Arrange
        $student = new Student();
        $student->setSurname("Details");
        $expectedResult = "Details";

        // Act
        $result = $student->getSurname();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

        public function testGetFirstName()
        {
            // Arrange
            $student = new Student();
            $student->setFirstName("Details");
            $expectedResult = "Details";

            // Act
            $result = $student->getFirstName();

            // Assert
            $this->assertEquals($expectedResult, $result);
        }

          public function joinedClub()
          {
              // Arrange
              $student = new Student();
              $student->setJoinedClub("Details");
              $expectedResult = "Details";

              // Act
              $result = $student->getJoinedClub();

              // Assert
              $this->assertEquals($expectedResult, $result);
          }

              public function testGetLastGrading()
              {
                  // Arrange
                  $student = new Student();
                  $student->setLastGrading("Details");
                  $expectedResult = "Details";

                  // Act
                  $result = $student->getLastGrading();

                  // Assert
                  $this->assertEquals($expectedResult, $result);
              }

                 public function testGetCurrentGrading()
                 {
                     // Arrange
                     $student = new Student();
                     $student->setCurrentGrading("Details");
                     $expectedResult = "Details";

                     // Act
                     $result = $student->GetCurrentGrading();

                     // Assert
                     $this->assertEquals($expectedResult, $result);
                 }


}
