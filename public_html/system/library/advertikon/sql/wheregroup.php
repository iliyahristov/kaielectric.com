<?php


namespace Advertikon\Sql;


/**
 * @method run()
 */
class WhereGroup {
    protected $glue;
    protected $parent;
    protected $content = [];

    public function __construct( $parent, $glue = 'AND' ) {
        $this->parent = $parent;
        $this->glue = $glue;
    }

    /**
     * @return Select
     */
    public function end() {
        return $this->parent;
    }

    public function group( $glue = 'AND' ) {
        $group = new WhereGroup( $this, $glue );
        $this->content[] = $group;
        return $group;
    }

    /**
     * @param $value
     * @return Comparision
     * @throws \Advertikon\Exception
     */
    public function where( $value ) {
        $where = new Where( $this );
        $this->content[] = $where;
        return $where->field( $value );
    }

    /**
     * @return Where
     * @throws \Advertikon\Exception
     */
    public function value() {
        $where = new Where($this);
        $this->content[] = $where;
        return $where;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render() {
        $ret = [];

        /** @var WhereGroup|Where $item */
        foreach ($this->content as $item ) {
            $ret[] = $item->render();
        }

        if ( count( $ret ) > 1 ) {
            return '(' . implode( " {$this->glue} ", $ret ) . ')';
        }

        return implode( $this->glue, $ret );
    }
}