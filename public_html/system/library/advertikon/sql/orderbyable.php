<?php
/**
 * Advertikon orderbyed.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace advertikon\sql;


trait OrderByAble {
	private $orderBy = [];

	public function orderBy( $expression, $order = 'ASC' ) {
		$this->orderBy[] = [ new \Advertikon\Sql\FieldValue($expression), in_array( strtoupper( $order ), ['ASC', 'DESC'] ) ? strtoupper( $order ) : 'ASC' ];
		return $this;
	}

	/**
	 * @return string
	 * @throws \Advertikon\Exception
	 */
	private function renderOrderBy() {
		$ret = [];

		foreach( $this->orderBy as $order ) {
			$ret[] = \Advertikon\Sql::process( $order[0] ) . ' ' . $order[1];
		}

		return $ret ? 'ORDER BY ' . implode( ', ', $ret ) : '';
	}

}