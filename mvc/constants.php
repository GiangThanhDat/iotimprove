
<?php 

	
	//IP
	define("LOCALHOST",getHostByName(getHostName()));

	// path
	define("ROOT",dirname(__DIR__));
	define("MODElS",ROOT.DIRECTORY_SEPARATOR."mvc".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR);
	define("VIEWS",ROOT.DIRECTORY_SEPARATOR."mvc".DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR);
	define("CONTROLLERS",ROOT.DIRECTORY_SEPARATOR."mvc".DIRECTORY_SEPARATOR."controllers".DIRECTORY_SEPARATOR);
	define("CORE",ROOT.DIRECTORY_SEPARATOR."mvc".DIRECTORY_SEPARATOR."core".DIRECTORY_SEPARATOR);
	define("FILES",ROOT.DIRECTORY_SEPARATOR."mvc".DIRECTORY_SEPARATOR."files".DIRECTORY_SEPARATOR);
	define("PHPMAILER",ROOT.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."PHPMailer-master".DIRECTORY_SEPARATOR);
	
	// database

	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "iot_project_improve");

	// define("DB_HOST", "sql12.freemysqlhosting.net");
	// define("DB_USER", "sql12358199");
	// define("DB_PASS", "iLPb2h6PPC");
	// define("DB_NAME", "sql12358199");


