# Using Sparkle Profile Reporting on your Web Server
(adapted from notes by Tom Harrington)

This distribution includes sample PHP code which can be used on your web server to collect the data and save it to a database.  There's also a simple PHP script to display collected information in a web page.  Graph generation as on Omni's update page is as yet unimplemented. 

Why PHP?  Because I know PHP.  If you prefer some other scripting language, you'll have to write your own server code.

# Server Requirements
To effectively use Sparkle with profiling, your server must support a database engine and a server-side scripting language which can access that database.  The included demo code requires:
* PHP version 5.x (PHP 7 compatible)
* MySQL 5.x.

Since the Sparkle profile code uses standard HTTP variables, it should be straightforward to write comparable code in Python, Ruby, Perl, or whatever other language you might prefer to use.

Setting up the demo Sparkle profile code on your server

First, create a database that will contain the profile reports.  How to do this depends on your web host.  Once the database is created, load the schema from profileInfo.sql.  Using MySQL's command-line client, this would be something like:

mysql -u username -h host -p database-name < profileInfo.sql

Your web host may make some alternative method available to you.

Now edit profileConfig.php.  At the top of the file are several PHP variables that must be configured.

These variables tell the PHP script how to access your database:

$db_host        = "DATABASE HOST";
$db_user        = "DATABASE USER NAME";
$db_password    = "DATABASE PASSWORD";
$db_name        = "DATABASE NAME";

One more variable tells the PHP script the location of your appcast file:

$appcastURL = "http://you.org/svn/Sparkle/trunk/sparkletestcast.xml";

Then upload profileInfo.php and profileConfig to your web host.  The URL to profileInfo.php should match the URL you entered in your app's Info.plist for the SUFeedURL key.

That's it!  Your web server is now ready to accept Sparkle requests with profile reports.

If you like, you can also load the file profileLookup.php on your web server.  It's a simple script to look up profile reports from the last month and display them in an HTML table. 

# To Do
* Refactor Code to follow modern standards
* Use Prepared SQL Statements

# License
MIT License
