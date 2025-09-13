<?php
/**
 * Advertikon limitable.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace advertikon\sql;


trait LimitAble {
	private $limit;
	private $start = 0;

	public function limit( $count, $offset = 0 ) {
		$this->limit = $count;
		$this->start = $offset;
		return $this;
	}

	private function renderLimit() {
		return $this->limit ? "LIMIT {$this->start}, {$this->limit}" : '';
	}
}