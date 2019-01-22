<?php
include_once("model/Users.php");
include_once("model/Timesheet.php");
echo "Hello Test <br>";

$userModel = new Users();
$user=$userModel->getUser(60001);
print_r($user);
echo "<br>";

$wkModel = new Timesheet();
$timesheet=$wkModel->getTimesheetsCurrent();
print_r($timesheet);
echo "<br>";

$wkModel = new Timesheet();
$timesheet=$wkModel->getTimesheetsByUser(60001,'2018-11-03','2018-11-10');
print_r($timesheet);
echo "<br>";

?>