<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'database_connect.php';

class Source {
	public static function Source::getContent(content_id) {
		$query = "select from source where id='"+ content_id +"'";
		$result = mysql_query($query) or die("Could select source from database ".mysql_error());
		return mysql_fetch_object($result);
	}

	public static function addSource($type, $reference, $content){
		$query = "insert into source values('','$type', '$reference', '$content')";
		$result = mysql_query($query) or die("Could not insert Source into the database ".mysql_error());
		return true;
	}
}
?>