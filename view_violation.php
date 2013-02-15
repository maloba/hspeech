<?php
include 'rule.php';

$source_id = $_REQUEST['id'];

$violations = Violation::getViolations($source_id);

echo "<table>";
	echo "<tr>";
	echo "<td>Violation</td>";
	echo "<td>Rule Violated Id</td>";
	echo "<td>Rule Violated</td>";
	echo "</tr>";
foreach ($violations as $v) {
	echo "<tr>";
	echo "<td>".$v['textWithViolation']."</td>";
	echo "<td>".$v['rule_id']."</td>";
	echo "<td>".Rule::getRule($v['rule_id'])->descriptionOfRule."</td>";
	echo "</tr>";
}
echo "</table>";
?>