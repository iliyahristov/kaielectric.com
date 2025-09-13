<?php


namespace Advertikon\Sql;


class Where implements Comparision {
	/** @var WhereGroup */
    private $parent;
    /** @var RawValue|mixed */
    private $value;
    private $operation = '=';
    private $field;

    /** @var \Advertikon\Advertikon */
    private $a;

    /**
     * Where constructor.
     * @param $parent
     * @throws \Advertikon\Exception
     */
    public function __construct($parent) {
        $this->parent = $parent;
        $this->a = \Advertikon\Advertikon::instance();
    }

    /**
     * @param $val
     * @return Comparision
     */
    public function field( $val ) {
        $this->field = $val;
        return $this;
    }

    /**
     * @return WhereGroup
     */
    private function end() {
        return $this->parent;
    }

    public function equal($value) {
        $this->operation = '=';
        $this->value = $value;
        return $this->end();
    }

	public function equalField($value) {
		$this->operation = '=';
		$this->value = new FieldValue( $value );
		return $this->end();
	}

    public function notEqual($value) {
        $this->operation = '<>';
        $this->value = $value;
        return $this->end();
    }

    public function like($value) {
        $this->operation = 'LIKE';
        $this->value = $value;
        return $this->end();
    }

    public function notLike($value) {
        $this->operation = 'NOT LIKE';
        $this->value = $value;
        return $this->end();
    }

    public function greater($value) {
        $this->operation = '>=';
        $this->value = $value;
        return $this->end();
    }

    public function lesser($value) {
        $this->operation = '<=';
        $this->value = $value;
        return $this->end();
    }

    public function greaterStrict($value) {
        $this->operation = '>';
        $this->value = $value;
        return $this->end();
    }

    public function lesserStrict($value) {
        $this->operation = '<';
        $this->value = $value;
        return $this->end();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render() {
        $ret[] = $this->getField();
        $ret[] = $this->getOperation();
        $ret[] = $this->getValue();
        return implode( ' ', $ret );
    }

    private function getField() {
        return implode( '.', array_map( function( $v ) { return "`$v`"; }, explode( '.', $this->field ) ) );
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function getOperation() {
        switch ( $this->operation ) {
            case '=':
                return is_array( $this->value ) ? 'IN' : '=';
            case '<>':
                return is_array( $this->value ) ? 'NOT IN' : '<>';
            case '>':
            case '<':
            case '>=':
            case '<=':
            case 'LIKE':
            case 'NOT LIKE':
                return $this->operation;
            default:
                throw new \Exception( 'Invalid operation' );
        }
    }

    /**
     * @return string
     * @throws \Advertikon\Exception
     */
    private function getValue() {
        return \Advertikon\Sql::process( $this->value );
    }
}

interface Comparision {
    /**
     * @param $value
     * @return WhereGroup
     */
    public function equal( $value );
    /**
     * @param $value
     * @return WhereGroup
     */
    public function notEqual( $value );
    /**
     * @param $value
     * @return WhereGroup
     */
    public function like( $value );
    /**
     * @param $value
     * @return WhereGroup
     */
    public function notLike( $value );
    /**
     * @param $value
     * @return WhereGroup
     */
    public function greater( $value );
    /**
     * @param $value
     * @return WhereGroup
     */
    public function lesser( $value );
    /**
     * @param $value
     * @return WhereGroup
     */
    public function greaterStrict( $value );
    /**
     * @param $value
     * @return WhereGroup
     */
    public function lesserStrict( $value );
}