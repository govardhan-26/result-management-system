<?php
session_start();
$conn = new mysqli('localhost', 'root', '');
mysqli_select_db($conn, 'srms');
$proname = $_SESSION['username'];               // something like this is optional, of course
$proid = substr($proname,4);
$subname="sub".$proid."_gpa";
$sql = "SELECT `id`,`student_name`,`$subname` FROM `studentwisemarks`";
$setRec = mysqli_query($conn, $sql);
$columnHeader = '';
$columnHeader = "Id" . "\t" . "Student Name" . "\t" . "GPA" . "\t";
$setData = '';
while ($rec = mysqli_fetch_row($setRec)) {
$rowData = '';
foreach ($rec as $value) {
$value = '"' . $value . '"' . "\t";
$rowData .= $value;
}
$setData .= trim($rowData) . "\n";
}
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=marks.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo ucwords($columnHeader) . "\n" . $setData . "\n";
?>
