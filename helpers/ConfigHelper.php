<?php

class ConfigHelper
{
  const DB_NAME = 'cms';
  const DB_USER = 'root';
  const DB_PWD = '000000';
  const LOGIN_URL = 'auth/login';
  const LOGOUT_URL = 'auth/logout';
  const MAIN_VIEW = 'view/home';

  static public function config_params($param) {
    $result = "";
    if(is_string($param)) {
      $result = self::iterateParams($param);
    } elseif(is_array($param)) {
      $result = [];
      foreach ($param as $value) {
        array_push($result,self::iterateParams($value));        
      }
    } else {
      $result = "undefined";
    }
    return $result;
  }

  private function iterateParams($param) {
    $result = "";
    switch ($param) {
      case 'db_name':
      $result = ConfigHelper::DB_NAME;
        break;
      case 'db_user':
        $result = ConfigHelper::DB_USER;
        break;
      case 'db_password':
        $result = ConfigHelper::DB_PWD;
        break;
      case 'login':
        $result = ConfigHelper::LOGIN_URL;
        break;
      case 'logout':
        $result = ConfigHelper::LOGOUT_URL;
        break;
      case 'main_view':
        $result = ConfigHelper::MAIN_VIEW;
        break;
      
      default:
        $result = "undefined";
        break;
    }
    return $result;
  }

}