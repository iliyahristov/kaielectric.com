<?php
namespace Advertikon;

class Sql {
    /**
     * @param null $table
     * @param bool $doLog
     * @return Sql\Select
     * @throws Exception
     */
    static public function select( $table = null, $doLog = false ) {
        return new Sql\Select( $table, $doLog );
    }

    /**
     * @param null $table
     * @param bool $doLog
     * @return Sql\Insert
     * @throws Exception
     */
    static public function insert( $table = null, $doLog = false ) {
    	return new Sql\Insert( $table, $doLog );
    }

    /**
     * @param null $table
     * @param bool $doLog
     * @return Sql\Delete
     * @throws Exception
     */
	static public function delete( $table = null, $doLog = false ) {
		return new Sql\Delete( $table, $doLog );
	}

	/**
	 * @param null $table
	 * @param bool $doLog
	 * @return Sql\Update
	 * @throws Exception
	 */
	static public function update( $table = null, $doLog = false ) {
		return new Sql\Update( $table, $doLog );
	}

    /**
     * @param $field
     * @return string
     * @throws Exception
     */
    public static function processField( $field ) {
        $a = \Advertikon\Advertikon::instance();
        return implode( '.', array_map( function($v)use($a) {return "`{$a->db->escape($v)}`";}, explode( '.', $field ) ) );
    }

    /**
     * @param $value
     * @return string
     * @throws Exception
     */
    public static function processValue( $value ) {
        $a = \Advertikon\Advertikon::instance();

        if ( is_array( $value ) ) {
            return '[' . implode( ', ', array_map( function($v)use($a) { return "'{$a->db->escape($v)}'";}, $value ) ) . ']';
        }

        return "'{$a->db->escape($value)}'";
    }

	/**
	 * @param $expression
	 * @return string
	 * @throws Exception
	 */
    public static function process( $expression ) {
	    $a = \Advertikon\Advertikon::instance();

    	if ( is_a( $expression, 'Advertikon\Sql\FieldValue' ) ) {
    		return self::processField( $expression );
	    }

	    if ( is_a( $expression, 'Advertikon\Sql\StringValue' ) ) {
		    return self::processValue( $expression );
	    }

	    if ( is_a( $expression, 'Advertikon\Sql\RawValue' ) ) {
		    return $a->db->escape( $expression );
	    }

	    return self::processValue( $expression );
    }

	/**
	 * @throws Exception
	 */
    public static function test() {
        $query = (new Sql())->insert( [ 'c' => 'customerr' ] );

        $query
            ->set( [ 'f1' => ['v1', 'v3' ], 'f2' => ['v2', 'v4' ] ] );

        echo $query . '<br>';
        var_dump( $query->run() );
    }
}