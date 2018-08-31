<?php
/**
 *
 */
class ConnectionHelper
{
    const SESSION_KEY = 'currentUser';

    public static function checkConnectedUser()
    {
        if(isset($_SESSION[self::SESSION_KEY])) {
            $user = new UserModel();
            $user->checkConnection($_SESSION[self::SESSION_KEY]);
        } else {
            header('Location: /' . ConfigHelper::config_params('login'));die;
        }
    }
}
