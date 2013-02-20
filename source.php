<?php
include 'database_connect.php';

class Source {
	public static function getContent($content_id) {
		$query = "select * from source where id='$content_id'";
		$result = mysql_query($query) or die("Could #getContent(id)# source from database ".mysql_error());
		return mysql_fetch_object($result);
	}

	public static function addSource($type, $reference, $content){
		$query = "insert into source values('','$type', '$reference', '$content', 'false')";
		$result = mysql_query($query) or die("Could not #addSource()# into the database ".mysql_error());
		return true;
	}

	public static function editSource($sourceId, $type, $sourceReference, $content) {
		$query = "update source set values('','$type', '$sourceReference', '$content') where id='$sourceId'";
		$result = mysql_query($query) or die("Could not #editSource()# into the database ".mysql_error());
		return true;
	}

	public static function setAsAnaylsed($sourceId) {
		$query = "update source set analysed='true' where id='$sourceId'";
		$result = mysql_query($query) or die("Could not #setAsAnaylsed()# into the database ".mysql_error());
		return true;
	}

	public static function removeSource($source_id) {
		$query = "delete from source where id='$sourceId'";
		$result = mysql_query($query) or die("Could not delete from Source in the database ".mysql_error());
		return true;
	}

	public static function getAllSourcesByType($type) {
		return Source::getAllSources($type, 'false');
	}

	public static function getAllSources($type, $isAnalysed) {
		$query = "";
		if($type == "all") {
			if($isAnalysed == "false") {
				$query = "select * from source where analysed='false'";
			} else {
				$query = "select * from source where analysed='true'";
			}
		} else {
			if($isAnalysed == "false") {
				$query = "select * from source where type='".$type."' and analysed='false'";
			} else {
				$query = "select * from source where type='".$type."' and analysed='true'";
			}
		}
		$result = mysql_query($query) or die("Could not get all the sources".mysql_error());
		$num = mysql_num_rows($result);
		$allSources = array();
		while ($row = mysql_fetch_assoc($result)) {
		    array_push($allSources,array('id'  => $row['id'], 'type' => $row['type'], 'sourceReference' => $row['sourceReference'], 'content' => $row['content']));
		}
		return $allSources;
	}

	public static function getAllTwitterHandles() {
		$query = "select distinct id, sourceReference from source where type='twitter'";
		$result = mysql_query($query) or die("Could not #getAllTwitterHandles(id)# source from database ".mysql_error());
		$allSources = array();
		while ($row = mysql_fetch_assoc($result)) {
		    array_push($allSources,array('id'  => $row['id'] ,'sourceReference' => $row['sourceReference']));
		}
		return $allSources;
	}

	public static function getTweets($handle){
		$tweets = json_decode(file_get_contents("http://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name={$handle}&count=100"));
		foreach ($tweets as $tweet) {
			addSource("twitter", $handle, $tweet['text']);
		}
	}

	public static function getBlogPosts($rssUrl){

	}
}
?>