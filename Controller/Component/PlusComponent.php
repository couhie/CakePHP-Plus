<?php
/**
 * plus.php
 * @author kohei hieda
 *
 */
class PlusComponent extends Component {

	function __construct(){
		require_once(dirname(dirname(dirname(__FILE__))).DS.'Vendor'.DS.'basics.php');

		if (Configure::read('debug') > 0) {
			require_once(dirname(dirname(dirname(__FILE__))).DS.'Vendor'.DS.'dBug'.DS.'dBug.php');
		}
	}

	function initialize(&$controller) {
	}

	function startup(&$controller) {
	}

	function beforeRender(&$controller) {
	}

	function beforeRedirect(&$controller) {
	}

	function shutdown(&$controller) {
	}

}
