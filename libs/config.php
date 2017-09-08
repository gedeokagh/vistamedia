<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

///Local
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'vistamedia');
define('DB_USER', 'root');
define('DB_PASS', '');
define("PX", "vistamedia");
define("GMAPKEY", "AIzaSyCZT6TYRimJY8YoPn0cABAdGnbVLGVusWg");
/*
switch($gid[2]){
			case "1":
			$uri="vistamedia";
			break;
			case "2":
			$uri="visualmandiri";
			break;
			case "3":
			$uri="SMP";
			break;
		}
*/
// AIzaSyCZT6TYRimJY8YoPn0cABAdGnbVLGVusWg
//Rahasia saat ini	wG2i9ZnRHwVfAh45kyg9hJfxEr0=
//define('URL', 'http://localhost/administrator/');
define("URL", "http://".$_SERVER["HTTP_HOST"]."/vistamedia/");

/*

//Online
define('DB_TYPE', 'mysql');
define('DB_HOST', 'mysql.idhostinger.com');
define('DB_NAME', 'u857741269_vista');
define('DB_USER', 'u857741269_root');
define('DB_PASS', 'RahasiaAJ4');

//define('URL', 'http://localhost/administrator/');
define("URL", "http://".$_SERVER["HTTP_HOST"]."/vistamedia/");
*/