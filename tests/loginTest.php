<?php
/**
 * Created by PhpStorm.
 * action: Darren Cosgrave
 * Date: 14/04/2016
 * Time: 08:40
 */

namespace Itb;
use Itb\Login;


class loginTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetId()
    {
        // Arrange
       $login = new Login();
       $login->setId(1);
        $expectedResult = 1;

        // Act
        $result =$login->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     *
     */
    public function testGetPassword()
    {
        // Arrange
        $login = new Login();
        $password = "password";
        $expectedResult = $password;

        $login->setPassword( $expectedResult);

        // Act
        $result = $login->getPassword();
        $bool = password_verify("password", $result);
        // Assert
        $this->assertTrue($bool);
    }


      public function testGetRole()
      {
          // Arrange
         $login = new Login();
         $login->setRole("Credentials");
          $expectedResult = "Credentials";

          // Act
          $result =$login->getRole();

          // Assert
          $this->assertEquals($expectedResult, $result);
      }

        public function testGetUsername()
        {
            // Arrange
            $login = new Login();
            $login->setUsername("Credentials");
            $expectedResult = "Credentials";

            // Act
            $result = $login->getUsername();

            // Assert
            $this->assertEquals($expectedResult, $result);
        }

}
