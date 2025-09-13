<?php

namespace Advertikon\Sql;


abstract class Query {
    protected $table = [];
    protected $doLog = false;

    /** @var \Advertikon\Advertikon */
    protected $a;

    /**
     * Query constructor.
     * @param null $table
     * @param bool $doLog
     * @throws \Advertikon\Exception
     */
    public function __construct( $table = null, $doLog = false ) {
        $this->a = \Advertikon\Advertikon::instance();
        $this->table = $table;
        $this->doLog = $doLog;
    }

    public function table( $table ) {
        $this->table = $table;
        return $this;
    }

    protected function getTable() {
        if ( is_array( $this->table ) ) {
            $name = current($this->table);
            $alias = key($this->table);

        } else {
            $name = $this->table;
            $alias = '';
        }

        return '`' . DB_PREFIX . $name . '`' . ( $alias ? " $alias" : '' ); // TODO: DB domain part? - db.table
    }

    public function getTableAlias() {
	    if ( is_array( $this->table ) ) {
		    return key($this->table);
	    }

	    return '';
    }

    abstract protected function render();

    public function run() {
        $queryString = $this->toString();

        if ( $this->doLog ) {
            $this->a->log( $queryString );
        }

        return $this->a->db->query( $queryString );
    }

    public function toString() {
        try {
            $ret[] = $this->render();
            return implode( ' ', $ret );

        } catch (\Exception $e ) {
            echo $e->getTraceAsString();
        }

        return '';
    }

    public function __toString() {
        return $this->toString();
    }

}

class RawValue {
    private $value = '';

    public function __construct( $value ) { $this->value = $value; }

    public function value() {
        return $this->value;
    }

    public function __toString() {
	    return $this->value();
    }
}

class FieldValue extends RawValue {}
class StringValue extends RawValue {}

class InsertFieldValue {
	private $parent;
	private $field;
	private $value;

	public function __construct( $parent ) {
		$this->parent = $parent;
	}

	public function field( $field ) {
		$this->field = $field;
		return $this;
	}

	public function value( $value ) {
		$this->value = $value;
		return $this->parent;
	}

	public function getField() {
		return $this->field;
	}

	public function getValue() {
		return $this->value;
	}
}