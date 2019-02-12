<?php
require_once( 'header.php' );
require_once('FormGenerator.php');
error_reporting(E_ERROR|E_CORE_ERROR|E_COMPILE_ERROR); // E_ALL|
ini_set('display_errors', 'On');
?>
<div style="padding: 3em;">
<?php
echo ( new FormGenerator( json_decode( file_get_contents( 'form-generator-spec.json' ), true ) ) )
    ->generate();