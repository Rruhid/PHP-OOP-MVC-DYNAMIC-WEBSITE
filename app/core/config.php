<?php

define ('APP_NAME', 'MY WEBSITE');
define ('APP_DESC', 'Learn English');

 



if($_SERVER['SERVER_NAME'] == 'localhost'){

    define ('DBHOST', 'localhost');
    define ('DBNAME', 'course_db');
    define ('DBUSER', 'root');
    define ('DBPASS', '');
    define ('DBDRIVER', 'mysql');

} else {

    define ('DBHOST', 'localhost');
    define ('DBNAME', 'course_db');
    define ('DBUSER', 'root');
    define ('DBPASS', '');
    define ('DBDRIVER', 'mysql');
}