<?php
include_once('Model.php');

/**
 *
 */
class ViewController
{
    static public function home() {
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        echo TemplateHelper::createTemplate('home', $page->getOne('title', 'home'));
    }
    static public function contact() {
        $page = new PageModel();
        echo TemplateHelper::createTemplate('contact', $page->getOne('title', 'Contact'));
    }
    static public function pageEditing() {
        $page = new PageModel();
        $pages = $page->getAll();
        $contentArray = ['title'=>'choix', 'content' => ""];
        $content = "";
        foreach ($pages as $key => $value) {
            $currentP = (array) $value;
            $currentPcontent = $currentP['content'];
            $content .= TemplateHelper::renderPartPage($page->getOne('title', 'pagePreview'), $currentP['title'], $key);
        }
        $contentArray["content"] = $content;
        echo TemplateHelper::createTemplate('editing', $contentArray);
    }

    static public function editPage() {
        $page = new PageModel();
        $content = (array)$page->getOne('title', $_POST["page"]);
        $scontent = $content['content'];
        $contentArray["content"] = $scontent;
        echo TemplateHelper::createTemplate('pageEditing', $contentArray);
    }

    static public function updatePage() {
        $dbConnec = new PDO('mysql:host=localhost;dbname=' . 
        ConfigHelper::config_params('db_name'), ConfigHelper::config_params('db_user'), ConfigHelper::config_params('db_password'));
        $request = $dbConnec->prepare('UPDATE pages SET content= ' . $_POST['textPage'] . 'WHERE ');
        $request->execute();

        $page = new PageModel();
        $content = (array)$page->getOne('title', $_POST["page"]);
        $scontent = $content['content'];
        $contentArray["content"] = $scontent;
        echo TemplateHelper::createTemplate('pageEditing', $contentArray);
    }

}
