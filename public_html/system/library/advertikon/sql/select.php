<?php


namespace Advertikon\Sql;


class Select extends Query {
	use WhereAble;
	use JoinAble;
	use OrderByAble;
	use LimitAble;

    private $value = [];
    private $groupBy;
    private $isDistinct = false;
    /** @var SelectRootWhereGroup */
    private $having;

    public function value( $value, $alias = null ) {
        if ( is_array( $value ) ) {
            foreach( $value as $a => $v ) {
                $this->value[] = [ 'value' => $v, 'alias' => is_int( $a ) ? '' : $a ];
            }

        } else {
            $this->value[] = [ 'value' => $value, 'alias' => $alias ];
        }

        return $this;
    }

    public function field( $value, $alias = null ) {
	    if ( is_array( $value ) ) {
		    foreach( $value as $a => $v ) {
			    $this->value[] = [ 'value' => new \Advertikon\Sql\FieldValue( $v ), 'alias' => is_int( $a ) ? '' : $a ];
		    }

	    } else {
		    $this->value[] = [ 'value' => new \Advertikon\Sql\FieldValue( $value ), 'alias' => $alias ];
	    }

	    return $this;
    }

    public function whereGroup( $glue = 'AND' ) {
        $this->where = new SelectRootWhereGroup( $this, $glue );
        return $this->where;
    }

    public function distinct() {
    	$this->isDistinct = true;
    }

	/**
	 * @param $value
	 * @return Comparision
	 * @throws \Advertikon\Exception
	 */
	public function having( $value ) {
		return $this->havingGroup()->where( $value );
	}

	public function havingGroup( $glue = 'AND' ) {
		$this->having = new RootWhereGroup( $this, $glue );
		return $this->where;
	}

    public function groupBy( $expression ) {
    	$this->groupBy = new \Advertikon\Sql\FieldValue( $expression );
    	return $this;
    }

	/**
	 * @return array
	 */
    public function run() {
        $res = parent::run();
        return $res->rows;
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function render() {
        $ret[] = 'SELECT';
        $ret[] = $this->isDistinct ? 'DISTINCT' : '';
        $ret[] = $this->renderValues();
        $ret[] = 'FROM';
        $ret[] = $this->getTable();
        $ret[] = $this->renderJoin();
        $ret[] = $this->renderWhere();
        $ret[] = $this->renderGroupBy();
        $ret[] = $this->renderHaving();
        $ret[] = $this->renderOrderBy();
        $ret[] = $this->renderLimit();

        return implode( ' ', $ret );
    }

    /**
     * @return string
     * @throws \Advertikon\Exception
     */
    private function renderValues(){
        if ( !$this->value ) return '*';

        $ret = [];

        foreach ( $this->value as $value ) {
            $name = \Advertikon\Sql::process( $value['value'] );
            $alias = $value['alias'];
            $ret[] = $name . ( $alias ? " as '{$this->a->db->escape( $alias)}'" : '' );
        }

        return implode( ', ', $ret );
    }

	/**
	 * @return string
	 * @throws \Advertikon\Exception
	 */
    private function renderGroupBy() {
	    return $this->groupBy ? 'GROUP BY ' . \Advertikon\Sql::process( $this->groupBy ) : '';
    }

	/**
	 * @return string
	 * @throws \Exception
	 */
	protected function renderHaving() {
		return $this->having ? 'HAVING ' . $this->having->render() : '';
	}
}