#!/usr/bin/php
<?php
	//might need to be a daemon --> should be run everytime $watchfile is altered
	/*notetaking system syntax:
		'note: note text ;' --or-- 'note name of note: note text ;'
		'task: task text ;'
	*/
	
	//file to watch for changes (this should probably be in the daemon 'master')
	$watchfile = '/Users/matt/todo.txt';
	
	$filetext = file_get_contents($watchfile);
	$commandfound = true;
	while($commandfound)
	{
		//find first note command and first task command, determine which is first
		$noteloc = strpos($filetext, 'note');
		$taskloc = strpos($filetext, 'task');
		if($noteloc < $taskloc && $noteloc != -1)
		{
			//note command exists and is first
			if(substr($filetext,$temploc+4,1) == ':')
			{
				//if immediately followed by ':', parse up to ';', create new file named with datetime with text as contents
				$filetext = substr($filetext,temploc+5);
				$endloc = strpos($filetext, ';');
				$notetext = substr($filetext, 0, $endloc);
				
				$datetime = date('g:ia, n/j/Y');
				$filedate = date('n-j-y_g-ia');
				$filepath = '/Users/matt/Documents/notes/notes/';
				exec("echo \"$notetext\" > $filepath$filedate.txt");
			}
			
		}
		else if($taskloc != -1)
		{
			
		}
	}
	//TODO:
	//parse file for 'note'
		//when found:
			//if immediately followed by ':', parse up to ';', create new file named with datetime with text as contents
			//if not, get text up to ':', then get text up to ';', create new file named with first text and with second text as contents
	//-after writing this program fully: cat all files in /task to one side of desktop with geektool
										//cat all files in /notes to other side of screen with geektool
	//clean up damn desktop so it's worthwhile!!
?>