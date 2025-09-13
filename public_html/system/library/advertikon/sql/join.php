<?php
/**
 * Advertikon join.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace advertikon\sql;


class Join {

	private $type = 'INNER';
	private $table = [];
	/** @var Where */
	private $on;
	private $parent;

	public function __construct( Query $parent ) {
		$this->parent = $parent;
	}

	/**
	 * @param $table
	 * @param null $alias
	 * @return Join
	 * @throws \Exception
	 */
	public function table( $table, $alias = null ) {
		if ( is_array( $table ) ) {
			$this->table = $table;
		}

		if ( is_null( $alias ) ) {
			throw new \Exception( "Alias required" );
		}

		$this->table = [ $alias => $table ];
		return $this;
	}

	public function type( $type ) {
		$this->type = $type;
		return $this;
	}

	/**
	 * @param $value
	 * @return Comparision
	 * @throws \Advertikon\Exception
	 */
	public function on( $value ) {
		$this->on = new Where( $this->parent );
		return $this->on->field( $value );
	}

	/**
	 * @param $value
	 * @throws \Advertikon\Exception
	 */
	public function using( $value ) {
		$this->on( $this->parent->getTableAlias() .'.'. $value )->equalField( key($this->table) . '.' . $value );
	}

	protected function getTable() {
		$name = current($this->table);
		$alias = key($this->table);

		return '`' . DB_PREFIX . $name . '`' . ( $alias ? " $alias" : '' ); // TODO: DB domane part? - db.table
	}

	protected function getType() {
		switch( strtoupper( $this->type ) ) {
			case 'INNER':
			case 'LEFT':
			case 'RIGHT':
			case 'OUTER':
				return strtoupper( $this->type );
			default:
				return 'INNER';
		}
	}

	/**
	 * @throws \Exception
	 */
	public function render() {
		$ret[] = $this->getType();
		$ret[] = 'JOIN';
		$ret[] = $this->getTable();
		$ret[] = $this->on ? 'ON ' . $this->on->render() : '';
		return implode( ' ', $ret );
	}
}