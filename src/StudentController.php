<?php
/**
 * controller ft retrieve student info
 * Created by PhpStorm.
 * User: Steve Curran
 * Date: 20/04/2016
 * Time: 17:40
 */
namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StudentController
 * @package Itb
 */
class StudentController
{
    /**
     * student controller class
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
 public function studentDetailAction(Request $request, Application $app, $id)
 {
     $studentRow = Student::getOneById($id);

     $argsArray = [
         'student' => $studentRow,
     ];

     $templateName = 'studentDetail';
     return $app['twig']->render($templateName . '.html.twig', $argsArray);
 }

 /*   public function editDisplayAction(Request $request, Application $app, $id)
    {
        $studentRow = Member::getOneById($id);


        $argsArray = [
            'memberRow' => $studentRow,
        ];
        //$app['session']->set('user', array('id' => $id));

        $templateName = 'editMemberRow';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }*/

    /**
     * Edit student
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function editStudentDisplayAction(Request $request, Application $app, $id)
    {
        $studentRow = Student::getOneById($id);


        $argsArray = [
            'studentRow' => $studentRow,
        ];
        //$app['session']->set('user', array('id' => $id));


        $templateName = 'editStudentRow';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * Edit Student
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function editStudentDetailsAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        //$id = $user['id'];
        // $username = $user['username'];

        $paramsPost = $request->request->all();
        $id = $paramsPost['id'];
        $surname = $paramsPost['surname'];
        $firstName = $paramsPost['firstName'];
        $joinedClub = $paramsPost['joinedClub'];
        $lastGrading = $paramsPost['lastGrading'];
        $currentGrade = $paramsPost['currentGrade'];
        //$name = $paramsPost['name'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $surname  = filter_var($surname, FILTER_SANITIZE_STRING);
        $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
        $joinedClub = filter_var($joinedClub, FILTER_SANITIZE_STRING);
        $lastGrading = filter_var($lastGrading, FILTER_SANITIZE_STRING);
        $currentGrade = filter_var($currentGrade, FILTER_SANITIZE_STRING);
        //$name = filter_var($name, FILTER_SANITIZE_STRING);



        $student = new Student();
        $student->setId($id);
        $student->setSurname($surname);
        $student->setFirstName($firstName);
        $student->setJoinedClub($joinedClub);
        $student->setLastGrading($lastGrading);
        $student->setCurrentGrade($currentGrade);
        //$student->setName($name);

        $succesfullUpdate = Student::update($student);



        $student = Student::getAll();

        $argsArray = [
            'username'=> '',
            'students' => $student
        ];


        $templateName = 'adminStudentDisplay';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
