<?php
/**************************************************************************************************
* This script is brought to you by yadu
* Website: www.yadunandan.club
* Email: ynandan55@gmail.com
***************************************************************************************************/

define('VASPLUS_APP', true);
include "config.php";
include "functions.php";

if(isset($_SERVER["REQUEST_METHOD"]) && strip_tags($_SERVER["REQUEST_METHOD"]) == strip_tags("POST"))
{
	//Do proper page checkings as all the PHP Code for this script are here to go to the right page based on the request brought
	if(isset($_POST["page"]) && !empty($_POST["page"])) 
	{
		$the_page = trim(strip_tags($_POST["page"]));
		
		$fullname = isset($_POST["fullname"]) ? trim(strip_tags($_POST["fullname"])) : "";
		$email = isset($_POST["email"]) ? trim(strip_tags($_POST["email"])) : "";
		$id = isset($_POST["id"]) ? trim(strip_tags($_POST["id"])) : "";
		
		
		
		
		
		if($the_page == "add_record") //Add Record
		{
			print add_record($fullname, $email);
		}
		
		
		
		else if($the_page == "load_record") //Load Added Record
		{
			print load_records();
		}
		
		
		
		
		
		else if($the_page == "edit_record") //Edit Record
		{
			print edit_record($fullname, $email, $id);
		}
		
		
		
		
		
		
		else if($the_page == "delete_record") //Delete Record
		{
			print delete_record($id);
		}
		
		 
		
		 
		 
		
		else 
		{
			echo 'Sorry, the page associated with the link you have just visited is unknown';
		}
	} 
	else 
	{
		echo 'Sorry, there was no proper request realized';
	}
} 
else 
{
	echo 'Sorry, there was no proper method realized';
}
?>