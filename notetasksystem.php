#!/usr/bin/php
<?php
	//might need to be a daemon --> should be run everytime $watchfile is altered
	/*notetaking system syntax:
		'note: note text ;' --or-- 'note name of note: note text ;'
		'task: task text ;'
	*/
	
	//file to watch for changes (this should probably be in the daemon 'master')
	$watchfile = 'watchfile.txt';
	$notesfolder = 'notes/';
	$tasksfolder = 'tasks/';
	
	
	$filetext = file_get_contents($watchfile);
	$commandfound = true;
	while($commandfound)
	{
		//find first note command and first task command, determine which is first
		$noteloc = strpos($filetext, 'n');
		$taskloc = strpos($filetext, 't');
		if($noteloc < $taskloc && $noteloc != -1)
		{
			//note command exists and is first
			if(substr($filetext,$temploc+1,1) == ':')
			{
				//if immediately followed by ':', parse up to ';', create new file named with datetime with text as contents
				$filetext = substr($filetext,$temploc+2);
				$endloc = strpos($filetext, ';');
				$notetext = substr($filetext, 0, $endloc);
				
				$filedate = date('n-j-y_g-ia');
				exec("echo \"$notetext\" > $notesfolder$filedate.txt");
			}
			else
			{
				//immediately followed by custom note title, parse up to ':', create a new file with name
				$titleend = strpos($filetext, ':');
				$filetitle = substr($filetext, $temploc+1, $titleend-1);
				$endloc = strpos($filetext,';');
				$notetext = substr($filetext, 0, $endloc);
				
				$datetime = date('g:ia, n/j/Y');
				exec("echo \"<$datetime>n$notetext\" > $notesfolder$filetitle.txt");
			}
		}
		else if($taskloc != -1)
		{
			if(substr($filetext,$temploc+1,1) == ':')
			{
				$filetext = substr($filetext, $temploc+2);
				$endloc = strpos($filetext, ';');
				$tasktext = substr($filetext, 0, $endloc);

				$filedate = date('n-j-y_g-ia');
				exec("echo \"$tasktext\" > $tasksfolder$filedate.txt");
			}
			else
			{
				//immediately followed by custom note title, parse up to ':', create a new file with name
				$titleend = strpos($filetext, ':');
				$filetitle = substr($filetext, $temploc+1, $titleend-1);
				$endloc = strpos($filetext,';');
				$tasktext = substr($filetext, 0, $endloc);
				
				$datetime = date('g:ia, n/j/Y');
				exec("echo \"<$datetime>n$tasktext\" > $tasksfolder$filetitle.txt");
			}
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