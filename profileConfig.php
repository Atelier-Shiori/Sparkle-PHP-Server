<?php
// This is where all the server-side configuration happens.
// Location of the real appcast file
// $Id: profileConfig.php 17 2006-06-13 18:54:00Z schwa $
// $HeadURL: http://sparkleplus.googlecode.com/svn/trunk/profileConfig.php $
$appcastURL = "";

// This is an associative array of all "good" keys expected from clients.
$appcastKeys = array('appName' => 1, 'appVersion' => 1, 'cpuFreqMHz' => 1, 'cpu64bit' => 1, 'cpusubtype' => 1, 'cputype' => 1, 'lang' => 1, 'model' => 1, 'ncpu' => 1, 'osVersion' => 1, 'ramMB' => 1);

// Database connectivity
$db_host	= "";
$db_user	= "";
$db_password	= "";
$db_name	= "";
// end configuration
?>
