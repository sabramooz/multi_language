<?php

/******************************************************************
 * 
 * Projectname:   Multi language class with xml and regular expression 
 * Version:       1.0
 * Author:        POOYA SABRAMOOZ <pooya_alen1990@yahoo.com>
 * Last modified: 29 09 2014
 * Copyright (C): 2014 All Rights Reserved
 * 
 * GNU General Public License (Version 2, June 1991)
 *
 * This program is free software; you can redistribute
 * it and/or modify it under the terms of the GNU
 * General Public License as published by the Free
 * Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will
 * be useful, but WITHOUT ANY WARRANTY; without even the
 * implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License
 * for more details.
 * 
 ******************************************************************/

class multiLanguage
{
    public static $xml;

    public static function getLanguage($language = 'en')
    {
		if(!isset($language)){
			$language = 'en';
			}
		
		// load xml file from langs folder
        self::$xml = simplexml_load_file("./langs/$language.xml");

    }  

    public static function translateRecursive($input)
    {

        if (is_array($input)) {


            $input = multiLanguage::$xml->$input[1];
        }


        return preg_replace_callback('/-#(.+?)#-/', 'multiLanguage::translateRecursive', $input);
    }

}

?>


