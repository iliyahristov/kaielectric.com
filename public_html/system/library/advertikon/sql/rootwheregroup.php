<?php


namespace Advertikon\Sql;


class RootWhereGroup extends WhereGroup {

    /**
     * @return Query
     */
    public function end() {
        return $this->parent;
    }

}