<?php
/**
 * member controller class
 * Class MemberController
 * @package Itb
 */
namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Itb\Login;
use Itb\User;
use Itb\Member;

/**
 * member controler class
 * Class MemberController
 * @package Itb
 */
class MemberController
{

    /**
     * Edit member table
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function editMemberTableDisplayAction(Request $request, Application $app)
    {

       $member = Member::getAll();


        $argsArray = [
            'members' => $member
        ];

        $templateName = 'editMember';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * retrevise members by id
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function editMemberDisplayAction(Request $request, Application $app, $id)
    {

        $memberRow = Member::getOneById($id);


        $argsArray = [
            'memberRow' => $memberRow,
        ];
        //$app['session']->set('user', array('id' => $id));

        $templateName = 'editMemberRow';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * edit member action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function editMemberDetailsAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        //$id = $user['id'];
       // $username = $user['username'];

        $paramsPost = $request->request->all();
        $id = $paramsPost['id'];
        $currentBeltGrade = $paramsPost['currentBeltGrade'];
        $currentStatus = $paramsPost['currentStatus'];
        $nextGrade = $paramsPost['nextGrade'];
        $nextBeltGradeSyllabus = $paramsPost['nextBeltGradeSyllabus'];
        $requireStatus = $paramsPost['requireStatus'];
        $name = $paramsPost['name'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $currentBeltGrade  = filter_var($currentBeltGrade, FILTER_SANITIZE_STRING);
        $currentStatus = filter_var($currentStatus, FILTER_SANITIZE_STRING);
        $nextGrade = filter_var($nextGrade, FILTER_SANITIZE_STRING);
        $nextBeltGradeSyllabus = filter_var($nextBeltGradeSyllabus, FILTER_SANITIZE_STRING);
        $requireStatus = filter_var($requireStatus, FILTER_SANITIZE_STRING);
        $name = filter_var($name, FILTER_SANITIZE_STRING);



        $member = new Member();
        $member->setId($id);
        $member->setCurrentBeltGrade($currentBeltGrade);
        $member->setCurrentStatus($currentStatus);
        $member->setNextGrade($nextGrade);
        $member->setNextBeltGradeSyllabus($nextBeltGradeSyllabus);
        $member->setRequireStatus($requireStatus);
        $member->setName($name);

        $succesfullUpdate = Member::update($member);

        $member = Member::getAll();

        $argsArray = [
            'username'=> '',
            'members' => $member,
        ];

        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * create member action
     * @param Request $request
     * @param Application $app
     * @return mixed
     *
     */
    public function createMemberAction(Request $request, Application $app)
    {

        $argsArray = [

        ];


        $templateName = 'createMember';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);


    }

    /**
     * new member action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function newMemberAction(Request $request, Application $app)
    {

        $paramsPost = $request->request->all();
        $id = $paramsPost['id'];
        $currentBeltGrade = $paramsPost['currentBeltGrade'];
        $currentStatus = $paramsPost['currentStatus'];
        $nextGrade = $paramsPost['nextGrade'];
        $nextBeltGradeSyllabus = $paramsPost['nextBeltGradeSyllabus'];
        $requireStatus = $paramsPost['requireStatus'];
        $name = $paramsPost['name'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $currentBeltGrade  = filter_var($currentBeltGrade, FILTER_SANITIZE_STRING);
        $currentStatus = filter_var($currentStatus, FILTER_SANITIZE_STRING);
        $nextGrade = filter_var($nextGrade, FILTER_SANITIZE_STRING);
        $nextBeltGradeSyllabus = filter_var($nextBeltGradeSyllabus, FILTER_SANITIZE_STRING);
        $requireStatus = filter_var($requireStatus, FILTER_SANITIZE_STRING);
        $name = filter_var($name, FILTER_SANITIZE_STRING);



        $member = new Member();
        $member->setId($id);
        $member->setCurrentBeltGrade($currentBeltGrade);
        $member->setCurrentStatus($currentStatus);
        $member->setNextGrade($nextGrade);
        $member->setNextBeltGradeSyllabus($nextBeltGradeSyllabus);
        $member->setRequireStatus($requireStatus);
        $member->setName($name);



        $succesfulUpdate = Member::insert($member);

        $member = Member::getAll();
        $user = $app['session']->get('user');

        $argsArray = [
            'username'=> $user['username'],
            'members' => $member,
            /*'text' => 'Insert was  successful',
            */
        ];

        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * delete member table action
     * @param Request $request
     * @param Application $app
     * @return mixed
     *
     */
    public function deleteMemberTableDisplayAction(Request $request, Application $app)
    {

        $members = Member::getAll();



       $argsArray = [
            'members' => $members,
            'text' => ''
        ];


        $templateName = 'deleteMember';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);


    }

    /**
     * delete member
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     */
    public function deleteMemberAction(Request $request, Application $app, $id)
    {

        $deleteSuccessful = Member::delete($id);


        return $app->redirect('/admin');

    }




}