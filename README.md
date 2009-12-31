NoteTaskSystem
===

A set of scripts written in PHP to manage and monitor folders of notes and of tasks. Notes and tasks are stored with the date and time, and notes can be given a custom title. It is designed with an extremely simple syntax. 

Files are saved by default in '/notes/' and tasks by default in '/tasks/'.

It is designed to be used in conjunction with any program to output scripts to the desktop such as:
-Geektool (os x)
-Conky (GNU/Linux)

'/watchfile.php' should be set to open in a text editor with a keystoke. I use option-command-delete, and set the keystroke with Spark.

Syntax
---

To add a note, titled with the date and time:
'n: this is a note;'

To add a note with a custom title:
'n title: this is a note title title;'

To add a todo item:
't: this is a task;'