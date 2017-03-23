<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add, Edit and Delete Record</title>

<style type="text/css">
.record_box
{
	margin:0 auto;
	width:600px; 
	height:auto; 
	border:10px solid #E9E9E9; 
	text-align:left; 
	font-family:arial; 
	font-size:13px; 
	padding:12px;
}
.button { cursor:pointer; padding:6px; }
</style>
</head>

<body>



<div class="record_box">
<h2>Add Record</h2>

Fullname:<br />
<input type="text" id="fullnameadd" value="" /><br /><br />

Email: <br />
<input type="text" id="emailadd" value="" /><br /><br />

<input type="button" value="Submit" class="button" onclick="vpb_record_system('add', 'add');" />

<span id="rs_status_add"></span>

<br /><br />



<h2>Edit or Delete Record</h2>

<span id="rs_status_edit"></span>
<span id="rs_status_delete"></span>

            
<div style="margin-top:10px;" id="rs_status_load"></div>

</div>




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
