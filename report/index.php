<?php
// index.php: Just a bootstrap file
require_once "Report.php";

$report = new Report;
$report->run()->render();

