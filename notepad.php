<?php
	
	//the archives II

	//this script is intended to be run off the command option-command-z
	//create a new txt file, 
	//name it with date/time, 
	//write date/time\n\n on file 
	//(maybe the message of the day and sms messages from the day: google voice download script? )


	//note: string leds with a cool design along the hooks!
	//note: security script on key command to delete all files referencing any 	offsite server on list? delete specific files?
	include_once('/Users/matt/Documents/Scripts/mattscriptlibrary.php');
	if($argc > 1)
	{
		ob_start();
		$savelocation = $savelocation = ob_get_contents();
		ob_end_clean();
	}
	else
	{
		$savelocation = '/Users/matt/Documents/notes';
	}
	
	date_default_timezone_set('America/New_York');
	$datetime = date('g:i, n/j/Y');
	$filedate = date('n-j-y_g-ia');
	$stickynote = "\n\n<stickynoteinfo>
	<datetime>$datetime</datetime>
	<schoolinfo>
		<semester>$thearchives_semester</semester>
		<classes>$thearchives_classes</classes>
	</schoolinfo>
</stickynoteinfo>";
	$filepath = "$savelocation/$filedate.xml";
	exec("echo \"$stickynote\" > $filepath");
	exec("chmod 777 '$filepath'");
	exec("open -a TextEdit '$savelocation/$filedate.xml'");
?>