<?php
/**
 * Advertikon update.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace advertikon\sql;


class Update extends Query {
	use SetAble;
	use WhereAble;
	use OrderByAble;
	use LimitAble;

	/**
	 * @return string
	 * @throws \Advertikon\Exception
	 * @throws \Exception
	 */
	protected function render() {
		$ret[] = 'UPDATE';
		$ret[] = $this->getTable();
		$ret[] = $this->renderSet();
		$ret[] = $this->renderWhere();
		$ret[] = $this->renderOrderBy();
		$ret[] = $this->renderLimit();

		return implode( ' ', $ret );
	}

	/**
	 * @throws \Advertikon\Exception
	 */
	private function renderSet() {
		$this->processData();
		$ret = [];

		foreach ( $this->processed as $field => $values ) {
			$ret[] = \Advertikon\Sql::processField( $field ) . '=' . \Advertikon\Sql::process( $values[0] );
		}

		return $ret ? 'SET ' . implode( ', ', $ret ) : '';
	}

    public function run() {
        parent::run();
        return $this->a->db->getLastId();
    }
}