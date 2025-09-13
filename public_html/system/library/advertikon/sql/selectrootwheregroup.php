<?php


namespace Advertikon\Sql;


class SelectRootWhereGroup extends WhereGroup {
    /**
     * @return Select
     */
    public function end() {
        return $this->parent;
    }
}