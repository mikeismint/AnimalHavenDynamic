<?php

ini_set( "display_errors", true );  // Set to false for public
date_default_timezone_set( "Europe/London" );


/****  DATABASE SETTINGS ****/
define( "DB_DSN", "mysql:host=localhost;dbname=Otterspool" );
define( "DB_USERNAME", "test" );
define( "DB_PASSWORD", "test" );
define( "ADMIN_USERNAME", "test" );
define( "ADMIN_PASSWORD", "test" );


/****  FOLDER STRUCTURE ****/
define( "CLASS_PATH", "classes" );
define( "VIEW_PATH",  "views" );
define( "STYLES_PATH", VIEW_PATH . "/styles" );
define( "IMAGE_PATH", VIEW_PATH . "/images" );


/****  CLASS INCLUDES ****/
require_once( CLASS_PATH . "/Animal.php" );
require_once( CLASS_PATH . "/AnimalType.php");


/**** ERROR HANDLING ****/
function handleException ( $exception ) {
  echo "Sorry, a problem has occurred. Please try again. ";
  error_log ( $exception->getMessage() );
}
set_exception_handler( 'handleException' );

?>
