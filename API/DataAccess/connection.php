<?php

// This file create a connection between php and sql server

// Server Name Instace
$ServerInstance="MXLTITPRACT\SALCEDOJ";

// Connection string parameter
$ConnectionParameters=array('Database' => 'Hardware_Inventory', "UID"=>"sa", "PWD"=>"Welchallyn2", "CharacterSet" => 'UTF-8' );

// Creates the connection.
$Connection=sqlsrv_connect($ServerInstance, $ConnectionParameters);

// Handling errors
if ( $Connection ) {
  // echo "On Database";
}else {

  die( print_r( sqlsrv_errors(),true ) );

}


 ?>
