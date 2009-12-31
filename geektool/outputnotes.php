#!/usr/bin/php
<?php
	//intended to be run on geektool or similar programs,
		//set geektool to run this every second
		
	$notesfolder = '/Users/matt/Documents/notes/notes/';
	
	$notes = exec('cat $notesfolder*');
	$notesfilenames[] = opendir($notesfolder);
	
	foreach($notesfilenames as $filename)
	{
		echo $filename;
		echo '\n===\n';
		exec('cat $notesfolder/$filename');
		echo '\n---\n';
	}
?>