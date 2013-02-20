<?php

include 'database_connect.php';
include 'source.php';
//Display list of sources
include '/views/header.php';

$sourceList = Source::getAllSources("all", "true");
?>

<div id="add-new-source">
	<form action="saveSource.php">
		<label for="type"></label>
		<select name="type">
			<option value="twitter">Twitter</option>
			<option value="sms">Sms</option>
			<option value="blog">Blog</option>
		</select>

		<label for="reference"></label>
		<input name="reference">

		<input type="submit" value="Save Source">
	</form>
</div>
<?php
echo "<div>";
echo "<table>";
foreach ($sourceList as $source) {
	echo "<tr>";
	echo "<td>".$source['id']."</td>";
	echo "<td>".$source['type']."</td>";
	echo "<td>".$source['sourceReference']."</td>";
	echo "<td>".$source['content']."</td>";
	echo "<td><a href='#'>Edit</a></td>";
	echo "<td><a href='view_violation.php?id=".$source['id']."'>View Violation</a></td>";
	echo "</tr>";
}
echo "</table>";
echo "</div>";

include '/views/footer.php';
//Offer link for editing the source
//Offer link for viewing the violation on that source
?>

<style>
	body {
		width:900px;
	}
	td {
		vertical-align: top;
	}
</style>