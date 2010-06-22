<?php
foreach($this->results AS $result)
{
	if(isset($result->Medium->uri))
	{
		echo "<div>";
			echo html::img($result->Medium->uri)."<br />";
		echo "<div>";
	}
}
?>