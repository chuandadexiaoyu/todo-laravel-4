<?php

/**
 * @package Tools
 * @version 1.0
 * @author Shhu
 */

class Tools {

	/**
	 * Replace <br> to \n
	 * @param  string $string
	 * @return string
	 */
	public static function br2nl($string)
	{
		return preg_replace('#<br\s*/?>#i', "\n", $string);
	}

}
