<?php
/**
 *
 */
class TemplateHelper
{
    const TEMPLATE_DIRECTORY = "views";

    public static function createTemplate($templateName,$values)
    {
        $header = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/header.html');
        $emptyTemplate = file_get_contents(self::TEMPLATE_DIRECTORY . '/' . $templateName . '.html');
        $footer = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/footer.html');
        $result = $header . $emptyTemplate . $footer;
        foreach ($values as $key => $value) {
            // If the key is found inside the template, we replace the key with the content coming from the DB
            // If not, we do nothing to allow for greater flexibility
            if(strpos($result, '%%' . strtoupper($key) . '%%')) {
                $result = str_replace('%%' . strtoupper($key) . '%%', $value, $result);
            }
        }
        return $result;
    }
    public static function renderPartPage($values,$extra,$extra2 = "") {
        $result = " %%CONTENT%% ";
        foreach ($values as $key => $value) {
            // If the key is found inside the template, we replace the key with the content coming from the DB
            // If not, we do nothing to allow for greater flexibility
            if(strpos($result, '%%' . strtoupper($key) . '%%')) {
                $result = str_replace('%%' . strtoupper($key) . '%%', $value, $result);

            }
        }
        $result = str_replace('%%PAGE_TITLE%%', $extra, $result); //plus le temps
        $result = str_replace('%%INDEX%%', $extra2, $result); //plus le temps
        
        return $result;
    }
}
