<?php
foreach($this->response AS $key=>$value)
{
	echo "<p>";
	echo "<b>".$value->user->name."</b> (".$value->user->screen_name.")<br />";
	echo "<b>Msg:</b> ".$value->text;
	echo "</p>";
}
?>