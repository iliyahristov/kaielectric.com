<?php
/**
 * Advertikon whereable.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace advertikon\sql;


trait WhereAble {
	/** @var WhereGroup */
	protected $where;

	/**
	 * @param $value
	 * @return Comparision
	 * @throws \Advertikon\Exception
	 */
	public function where( $value ) {
		return $this->whereGroup()->where( $value );
	}

	public function whereGroup( $glue = 'AND' ) {
		$this->where = new RootWhereGroup( $this, $glue );
		return $this->where;
	}

	/**
	 * @return string
	 * @throws \Exception
	 */
	protected function renderWhere() {
		return $this->where ? 'WHERE ' . $this->where->render() : '';
	}

}