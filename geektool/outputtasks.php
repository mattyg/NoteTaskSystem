#!/usr/bin/php
<?php
	//this is the same as outputnotes.php except notes is replaced with tasks
	
	//intended to be run on geektool or similar programs,
		//set geektool to run this every second
		
	$tasksfolder = '/Users/matt/Documents/notes/tasks/';
	
	$tasks = exec('cat $tasksfolder*');
	$tasksfilenames[] = opendir($tasksfolder);
	
	foreach($tasksfilenames as $filename)
	{
		echo $filename;
		echo '\n===\n';
		exec('cat $tasksfolder/$filename');
		echo '\n---\n';
	}
?>