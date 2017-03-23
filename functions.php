<?php
/**************************************************************************************************
* This script is brought to you by yadu
* Website: wwww.yadunandan.club
* Email: ynandan55@gmail.com
***************************************************************************************************/


// Add Records
function add_record($fullname, $email)
{
	global $MYSQLi;
	
	if( $fullname == "" || $email == "" || $email == "" )
	{
		return 'Sorry, there was a general system error, please refresh this page and try again.';
	}
	else
	{
		if(mysqli_query($MYSQLi,"insert into `users` values(0, '".mysqli_real_escape_string($MYSQLi,$fullname)."', '".mysqli_real_escape_string($MYSQLi,$email)."')"))
		{
			return 'completed';
		}
		else
		{
			return 'Sorry, the operation could not be completed at the moment, please try again.';
		}
	}
}





// Edit Records
function edit_record($fullname, $email, $id)
{
	global $MYSQLi;
	
	if( $fullname == "" || $email == "" || $id == "" || $id == "" )
	{
		return 'Sorry, there was a general system error, please refresh this page and try again.';
	}
	else
	{
		$check_records = mysqli_query($MYSQLi,"select * from `users` where `id` = '".mysqli_real_escape_string($MYSQLi,$id)."' limit 1");
		
		if(mysqli_num_rows($check_records) > 0)
		{
			if(mysqli_query($MYSQLi,"update `users` set `fullname` = '".mysqli_real_escape_string($MYSQLi,$fullname)."', `email` = '".mysqli_real_escape_string($MYSQLi,$email)."' where `id` = '".mysqli_real_escape_string($MYSQLi,$id)."'"))
			{
				return 'completed';
			}
			else
			{
				return 'Sorry, the operation could not be completed at the moment, please try again.';
			}
		}
		else
		{
			echo 'Sorry, the record you were trying to update could not be found in the system at the moment.';
		}
	}
}






// Delete Records
function delete_record($id)
{
	global $MYSQLi;
	
	if( $id == "" )
	{
		return 'Sorry, there was a general system error, please refresh this page and try again.';
	}
	else
	{
		if(mysqli_query($MYSQLi,"delete from `users` where `id` = '".mysqli_real_escape_string($MYSQLi,$id)."' limit 1"))
		{
			return 'completed';
		}
		else
		{
			return 'Sorry, the operation could not be completed at the moment, please try again.';
		}
	}
}








// Load all the records from the DB
function load_records()
{
	global $MYSQLi;
	
	$check_records = mysqli_query($MYSQLi,"select * from `users` order by `id` desc limit 10");
	
	if(mysqli_num_rows($check_records) > 0)
	{
		?>
        <div style="border:1px solid #E5E5E5; width:100%;">
        
        <div style=" float:left; border-right:1px solid #E5E5E5; width:200px; padding:10px;">Fullname</div>
        <div style=" float:left; border-right:1px solid #E5E5E5; width:220px; padding:10px;">Email Address</div>
        <div style=" float:left; width:100px; padding:10px; text-align:center;">Action</div>
        
        <div style="clear:both;"></div>
        </div>
        
        
        <?php
		while($get_record = mysqli_fetch_array($check_records))
		{
			ob_start();
			
			$id = trim(strip_tags($get_record["id"]));
			$fullname = trim(strip_tags($get_record["fullname"]));
			$email = trim(strip_tags($get_record["email"]));
			
			?>
            
            
            
            <!-- DITABLE RECORDS AREA -->
            <div style="border:1px solid #E5E5E5;border-top:0px solid #E5E5E5; width:100%; display:none;" id="record_a_<?php echo $id; ?>">
            
            <div style=" float:left; border-right:1px solid #E5E5E5; width:206px; padding:7px;">
            <input type="text" id="fullname<?php echo $id; ?>" value="<?php echo $fullname; ?>" />
            </div>
            
            <div style=" float:left; border-right:1px solid #E5E5E5; width:226px; padding:7px;">
            <input type="text" id="email<?php echo $id; ?>" value="<?php echo $email; ?>" />
            </div>
            
            
            <div style=" float:left; width:120px; padding:6px;">
            <input type="button" value="Save" onclick="vpb_record_system('edit', '<?php echo $id; ?>');" />
            <input type="button" value="Cancel" onclick="vpb_make_editable_record('<?php echo $id; ?>');" />
            </div>
            
            <div style="clear:both;"></div>
            </div>
            
            
            
            
            
            
            <!-- DEFAULT RECORDS AREA -->
            <div style="border:1px solid #E5E5E5;border-top:0px solid #E5E5E5; width:100%;" id="record_b_<?php echo $id; ?>">
            
            <div style=" float:left; border-right:1px solid #E5E5E5; width:200px; padding:10px;">
            <span id="fn_<?php echo $id; ?>"><?php echo $fullname; ?></span>
            </div>
            
            <div style=" float:left; border-right:1px solid #E5E5E5; width:220px; padding:10px;">
            <span id="em_<?php echo $id; ?>"><?php echo $email; ?></span>
            </div>
            
            <div style=" float:left; width:120px; padding:6px;">
            <input type="button" value="Edit" onclick="vpb_make_editable_record('<?php echo $id; ?>');" />
            <input type="button" value="Delete" onclick="vpb_record_system('delete', '<?php echo $id; ?>');" />
            </div>
            
            <div style="clear:both;"></div>
            </div>
            
            
            
            
            <?php
			
			ob_end_flush();
		}
	}
	else
	{
		return 'There is no record in the system at the moment.';
	}
}

?>