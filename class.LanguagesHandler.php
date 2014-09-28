<?php

class LanguagesHandler
{
    public static $xml;


    public static function getLanguageInfo($language = 'EN')
    {
        if (isset($_POST['changLang'])) {
            //  echo $_POST['changLang'] . '<hr />';
            $language = $_POST['changLang'];
        }
        //$langInfo = DatabaseHandler::GetRow("SELECT * FROM lang_countries WHERE countryCode = '$language' AND enable = 1");
        //print_r($langInfo);
        self::$xml = simplexml_load_file("langs/$language.xml");
        //return $langInfo;


    }

   

    public static function parseTagsRecursive($input)
    {

        //global $xml;


        if (is_array($input)) {


            $input = LanguagesHandler::$xml->$input[1];
        }


        return preg_replace_callback('/-#(.+?)#-/', 'LanguagesHandler::parseTagsRecursive', $input);
    }

    public static function getAvalLangs()
    {
        return DatabaseHandler::GetAll("SELECT * FROM lang_countries WHERE enable = 1");
    }
    //$index->changeDirection($langInfo['dir']);


    //$lang = xml2array($xml);

}

?>


