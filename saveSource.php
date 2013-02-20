<?php
include 'Source.php';

$reference=$_REQUEST['reference'];
$type=$_REQUEST['type'];

Source::addSource($type, $reference, "");


?>