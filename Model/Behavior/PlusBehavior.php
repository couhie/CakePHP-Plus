<?php
/**
 * PlusBehavior.php
 * @author kohei hieda
 *
 */
class PlusBehavior extends ModelBehavior {

	/**
	 * calcYearBetweenDate
	 * @param &$model
	 * @param $formDate
	 * @param $toDate
	 */
	function calcYearBetweenDate(&$model, $fromDate, $toDate) {
		if (empty($fromDate) || empty($toDate)) {
			return false;
		}
		$monthsOfTo = date('Y', strtotime($toDate)) * 12 + date('n', strtotime($toDate));
		$monthsOfFrom = date('Y', strtotime($fromDate)) * 12 + date('n', strtotime($fromDate));
		$age = floor(($monthsOfTo - $monthsOfFrom) / 12);
		if ($monthsOfTo % 12 == $monthsOfFrom % 12 &&
			date('j', strtotime($fromDate)) <= date('j', strtotime($toDate))) {
			$age++;
		}
		return $age;
	}

}