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
        header('Location: /' . ConfigHelper::config_params('home'));die;

    }

    static public function is_loged() {
        $username = $_SESSION[self::SESSION_KEY];
        if(!empty($username)) {
            $user = new UserModel();
            $isLoged = $user->is_loged($username);
            if($isLoged) {
                return 'true';
            } else {
                return 'false';
            }
        } else {
            return 'false';
        }
        
    }

    static public function logoutAction()
    {
        //@TODO update is_connected to 0
        session_destroy();
        header('Location: /' . ConfigHelper::config_params('home'));die;
    }
}
