<?php
// $Id: profileDB.php 2 2006-06-08 19:33:50Z tph $
// $HeadURL: http://sparkleplus.googlecode.com/svn/trunk/profileDB.php $
// TryOpenDb and CloseDb - Open and close the database.
// Change the username, password, and database to the correct values for your database
	$DbLink = FALSE;
	$DbError = "";

function TryOpenDb()
{
	global $DbLink;
	global $DbError;

	global $db_host;
	global $db_user;
	global $db_password;
	global $db_name;

	/* Connecting, selecting database */
	$DbLink = mysqli_connect($db_host, $db_user, $db_password);

	if (!$DbLink)
	{
		$DbError = mysqli_error($DbLink);
		return FALSE;
	}

	if (!mysqli_select_db($DbLink,$db_name))
	{
		$DbError = mysqli_error($DbLink);
		CloseDb();
		return FALSE;
	}

	mysqli_query($DbLink, "BEGIN");
	return $DbLink;
}
    
function  getDBLink() {
    global $DbLink;
    return $DbLink;
}

function CloseDb()
{
	global $DbLink;

	if ($DbLink)
	{
		mysqli_query($DbLink,"COMMIT");
		mysqli_close($DbLink);
		$DbLink = FALSE;
	}
}

function abortAndExit()
{
	global $DbLink;
	print "Aborting database communication: " . mysql_error();
	if ($DBLink) {
		mysqli_query($DbLink,"ROLLBACK");
		mysqli_close($DbLink);
		$DbLink = FALSE;
	}
	exit();
}
?>
