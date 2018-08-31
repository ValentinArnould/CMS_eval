<?php
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

}
