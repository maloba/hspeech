<?php

include 'database_connect.php';
include 'source.php';
//Display list of sources
include '/views/header.php';

$sourceList = Source::getAllSourcesByType("all");
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