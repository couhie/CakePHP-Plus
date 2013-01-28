<?php
/**
 * basics.php
 * @author kohei hieda
 *
 */

/**
 * g
 * @param $data
 */
if (!function_exists('g')) {
	function g($data, $recursive = 0) {
		if (Configure::read('debug') > 0) {
			$ret = array();
			$backtrace = debug_backtrace();
			for ($i = $recursive; $i > 0; $i--) {
				$call = null;
				if (!empty($backtrace[$i])) {
					$call['file'] = $backtrace[$i]['file'];
					$call['line'] = $backtrace[$i]['line'];
					$call['function'] = empty($backtrace[$i]['function']) ? null : $backtrace[$i]['function'];
					$call['class'] = empty($backtrace[$i]['class']) ? null : $backtrace[$i]['class'];
				}
				$ret["call[{$i}]"] = $call;
			}
			$call = null;
			$call['file'] = $backtrace[0]['file'];
			$call['line'] = $backtrace[0]['line'];
			$call['function'] = empty($backtrace[0]['function']) ? null : $backtrace[0]['function'];
			$call['class'] = empty($backtrace[0]['class']) ? null : $backtrace[0]['class'];
			$ret["call[0]"] = $call;
			$ret['data'] = $data;
			new dBug($ret);
		}
	}
}

/**
 * c
 * @param $str
 * @return string
 */
if (!function_exists('c')) {
	function c($str, $return = false) {
		if (Carrier::getBrowse(Configure::read('debug')) == Carrier::BROWSE_MOBILE) {
			if ($return) {
				return mb_convert_kana($str, 'k');
			} else {
				echo mb_convert_kana($str, 'k');
			}
		} else {
			if ($return) {
				return $str;
			} else {
				echo $str;
			}
		}
	}
}

/**
 * nl2sp
 * @param $str
 * @return string
 */
if (!function_exists('nl2sp')) {
	function nl2sp($str) {
		return strlen($str) > 0 ? $str : '&nbsp;';
	}
}

/**
 * emoji
 * @param $code
 * @return string
 */
if (!function_exists('emoji')) {
	function emoji($code) {
		return pack('H*', $code);
	}
}

/**
 * br2nl
 * @param $str
 * @return string
 */
if (!function_exists('br2nl')) {
	function br2nl($str){
		return preg_replace('/<br\s*?\/?>/i', "\n", $str);
	}
}

/**
 * formatNumber
 * @param $str
 * @return string
 */
if (!function_exists('formatNumber')) {
	function formatNumber($str){
		if (is_numeric($str)) {
			$str = number_format($str);
		}
		return $str;
	}
}
