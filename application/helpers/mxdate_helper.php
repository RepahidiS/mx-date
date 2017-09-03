<?php
	/**
	 * Codeigniter - Helpers | mxdate
	 * The helper is free to use. Distribution and development is only open if it is to be distributed free of charge.
	 *
	 * @author   Mahsum UREBE | https://github.com/mahsumurebe
	 * @category CIHelpers
	 * @date     04.09.2017
	 * @time     00:30
	 */
	if (! function_exists('mxdate')) {
		/**
		 *
		 * Codeigniter - Date function language translation.
		 * !!Language definitions must be under languages!!!
		 * It can be used especially on servers where setlocale does not work.
 		 * This function has the same date format as the date function. Provides translation at the point where the format becomes readable.
		 *
		 * @param string   $format Date Format
		 * @param null|int $time   Unix timestamp, If null is entered, the instant timestamp is automatically assigned.
		 *
		 * @return string
		 */
		function mxdate($format, $time = null)
		{
			/**
			 * @var CI_Controller $CI Instance of Codeigniter
			 */
			$CI =& get_instance();
			if (isset($CI->lang->is_loaded[ 'mxdate' ]) === false) {
				$CI->load->language('mxdate');
			}
			$lang_data = $CI->lang->line('mxdate');
			$time OR $time = time();
			$dst = '';
			for ($i = 0; $i < strlen($format); $i++) {
				$f = $format[ $i ];
				if (strlen(trim($f))) {
					if (array_key_exists($f, $lang_data)) {
						$lang = $lang_data[ $f ];
					} else {
						$lang = array();
					}
					// matches begin!
					switch ($f) {
						case 'A':
						case 'a':
						case 'F':
						case 'M':
						case 'l':
						case 'D':
							$tmp = strtolower(date($f, $time));
							if (array_key_exists($tmp, $lang)) {
								$dst .= $lang[ $tmp ];
							} else {
								$dst .= ucfirst($tmp);
							}
							break;
						case 'S':
							$day = intval(date('j'));
							if (array_key_exists($day, $lang)) {
								$dst .= $lang[ $day ];
							} else {
								$day = intval(end(str_split($day)));
								if (array_key_exists($day, $lang)) {
									$dst .= $lang[ $day ];
								}
							}
							break;
						case 'r':
							$dst .= mxdate('D, d M Y H:i:s O');
							break;
						default:
							$dst .= date($f, $time);
							break;
					}
				} else {
					$dst .= $f;
				}
			}

			return $dst;
		}
	}