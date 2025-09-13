<?php
/**
 * Advertikon delete.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace advertikon\sql;


class Delete extends Query {
	use WhereAble;
	use OrderByAble;
	use LimitAble;

	/**
	 * @return string
	 * @throws \Advertikon\Exception
	 * @throws \Exception
	 */
	protected function render() {
		$ret[] = 'DELETE';
		$ret[] = 'FROM';
		$ret[] = $this->getTable();
		$ret[] = $this->renderWhere();
		$ret[] = $this->renderOrderBy();
		$ret[] = $this->renderLimit();

		return implode( ' ', $ret );
	}

    public function run() {
        parent::run();
        return $this->a->db->getLastId();
    }
}