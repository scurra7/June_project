<?php
/**
 * main class
 * Class MainController
 * @package Itb
 *
 */
namespace Itb;

use Itb\Login;
use Itb\User;
use Itb\Member;
use Silex\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Main class for
 * Class MainController
 * @package Itb
 *
 */
class MainController
{
    /**
     * Days action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function daysAction(Request $request, Application $app)
    {
        $days = array(
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        );

        $argsArray = [
            'days' => $days,
        ];

        $templateName = 'days';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * Members action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function membersAction(Request $request, Application $app)
    {
        $members = Member::getAll();

        $argsArray = [

            'members'=> $members,
        ];



        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * index Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function indexAction(Request $request, Application $app)
    {
        $argsArray = [];

        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * Login Action
     *  login role for admin and student
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     *
     */
    public function loginAction(Request $request, Application $app)
    {

        // default is bad login
        $isLoggedIn = false;

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // search for user with username in repository
        $isLoggedIn = Login::canFindMatchingUsernameAndPassword($username, $password);
        $isRole = Login::FindingRole($username);
        // action depending on login success

        if ($isLoggedIn) {
            if ($isRole) {
                // store username in 'user' in 'session'
            $app['session']->set('user', array('username' => $username, 'role' => $isRole));
            // success - redirect to the secure admin home page
            return $app->redirect('/admin');
            } else {
                // store username in 'user' in 'session'
                $app['session']->set('user', array('username' => $username, 'role' => $isRole));
                // success - redirect to the secure admin home page
                return $app->redirect('/student');
            }
        }


        // Login page with error message
        // ------------
        $templateName = 'index';
        $argsArray = array(
            'errorMessage' => 'bad username or password - please re-enter'
        );

        //$templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * Admin action
     * redirects student away from admin login
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     *
     */
    public function adminPageAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');

        $members =Member::getAll();


        $argsArray = array(
                'members'=> $members,
                'username'=> $user['username']

        );

        if ($user['role']) {
            $templateName = 'admin';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            return new RedirectResponse("/student");
        }
    }

    /**
     * Student action
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     * redirects students
     */
    public function studentPageAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');

        if ($user['role']) {
            $students = Student::getAll();

            $argsArray = array(

                'students'=> $students,
                'username' => $user['username']

            );
        } elseif ($user['role'] == null) {
            return new RedirectResponse("/");
        } else {
            $students = Student::searchByColumn('id', 2);
            $argsArray = array(

                'students'=> $students,
                'username' => $user['username']

            );
        }


        $templateName = 'student';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    /**
     * Logout action
     * @param Request $request
     * @param Application $app
     * @return mixed
     * redirect to home page
     */
    public function logoutAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null);

        // redirect to home page
       //return $app->redirect('/');

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    /**
     * Error action
     * not found error page
     * @param \Silex\Application $app
     * @param             $message
     *
     * @return mixed
     */
    public static function error404(Application $app, $message)
    {
        $argsArray = [
            'name' => 'Fabien',
        ];
        $templateName = '404';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * Detail action
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     * renders the detail page
     */
    public function detailAction(Request $request, Application $app, $id)
    {
        $member = Member::getOneById($id);

        $argsArray = [
            'member' => $member,
        ];

        $template = 'detail';
        return $app ['twig']->render($template . '.html.twig', $argsArray);
    }

    /**
     *
     * If (!isset($blogPosts[$id])) {
     *  // generate a 404 error from within a controller...
     *  $app->abort(404, "Post $id does not exist.");
     * }
     */
}
