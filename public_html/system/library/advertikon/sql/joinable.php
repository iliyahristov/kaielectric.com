<?php
/**
 * Advertikon joinable.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace advertikon\sql;


trait JoinAble {
	/** @var Join[] */
	protected $join = [];

	/**
	 * @param $table
	 * @param null $alias
	 * @return Join
	 * @throws \Exception
	 */
	public function join( $table, $alias = null ) {
		$join = new Join( $this );
		$this->join[] = $join;
		return $join->table( $table, $alias );
	}

	/**
	 * @return string
	 * @throws \Exception
	 */
	protected function renderJoin() {
		$ret = [];

		foreach ( $this->join as $join ) {
			$ret[] = $join->render();
		}

		return implode( ', ', $ret );
	}
}