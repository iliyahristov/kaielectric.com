<?php
/**
 * Advertikon insert.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace advertikon\sql;


class Insert extends Query {
	use SetAble;

	protected function render() {
		$this->processData();

		$ret[] = 'INSERT INTO';
		$ret[] = $this->getTable();
		$ret[] = $this->renderFields();
		$ret[] = $this->renderValues();

		return implode( ' ', $ret );
	}

	public function run() {
        parent::run();
        return $this->a->db->getLastId();
    }

    private function renderValues() {
		$ret = [];
		$index = 0;

		while( true ) {
			$values = [];

			foreach( $this->processed as $value ) {
				if ( count( $value ) <= $index ) break 2;
				$values[] = $value[ $index ];
			}

			$ret[] = '(' . implode( ', ', array_map( function($v){ return \Advertikon\Sql::process($v);}, $values ) ) . ')';
			$index++;
		}

		return 'VALUES ' . implode( ', ', $ret );
	}

	private function renderFields() {
		return '(' . implode( ', ', array_map( function($v){ return \Advertikon\Sql::processField($v);}, array_keys( $this->processed ) ) ) . ')';
	}
}