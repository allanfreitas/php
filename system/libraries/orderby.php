<?php
class ORDERBY{
	function cmp($a, $b)
	{
		if ($a == $b) {
			return 0;
		}
		return ($a < $b) ? -1 : 1;
	}
}
?>