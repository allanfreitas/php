<div class="content">
	<p>
	<?
		while($this->test->fetch())
		{
			debug($this->test->toJSON(),"array");
		}
	?>
	</p>
</div>
