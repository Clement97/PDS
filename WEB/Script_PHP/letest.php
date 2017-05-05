<?php

$date = '3000-02-31';
 
if (strptime($date, "%Y-%m-%d"))
{
echo "vrai\n";
}
else
{
	echo("faux\n");
}