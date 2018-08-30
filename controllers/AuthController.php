<?php
/**
 *
 */
class AuthController
{
    const SESSION_KEY = 'currentUser';

    static public function login()
    {
        echo TemplateHelper::createTemplate('login', ['title'=>'login']);
    }

    static public function loginAction()
    {
        $user = new UserModel();
        $username = $user->connectUser();
        $_SESSION[self::SESSION_KEY] = $username;
        header('Location: /view/home');die;

    }
    static public function logoutAction()
    {
        //@TODO update is_connected to 0
        session_destroy();
        header('Location: /view/home');die;
    }
}
