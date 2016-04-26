<?php
/**
 * Created by PhpStorm.
 * action: Darren Cosgrave
 * Date: 14/04/2016
 * Time: 08:40
 */

namespace Itb;
use Itb\User;


class userTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $user = new User();
        $user->setId(1);
        $expectedResult = 1;

        // Act
        $result = $user->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

   public function testGetUsers()
    {
        // Arrange
        $user = new User();
        $user->setUsers("Details");
        $expectedResult = "Details";

        // Act
        $result = $user->getUsers();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

           public function testGetPassword()
           {
               // Arrange
               $user = new User();
               $user->setPassword("Details");
               $expectedResult = "Details";

               // Act
               $result = $user->getPassword();

               // Assert
               $this->assertEquals($expectedResult, $result);
           }

             public function role()
             {
                 // Arrange
                 $user = new User();
                 $user->setRole("Details");
                 $expectedResult = "Details";

                 // Act
                 $result = $user->getRole();

                 // Assert
                 $this->assertEquals($expectedResult, $result);
             }

                /* public function testGetLastGrading()
                 {
                     // Arrange
                     $user = new User();
                     $user->setLastGrading("Details");
                     $expectedResult = "Details";

                     // Act
                     $result = $user->getLastGrading();

                     // Assert
                     $this->assertEquals($expectedResult, $result);
                 }

                    public function testGetCurrentGrading()
                    {
                        // Arrange
                        $user = new User();
                        $user->setCurrentGrading("Details");
                        $expectedResult = "Details";

                        // Act
                        $result = $user->GetCurrentGrading();

                        // Assert
                        $this->assertEquals($expectedResult, $result);
                    }*/


}
