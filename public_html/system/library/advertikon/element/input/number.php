<?php

namespace Advertikon\Element\Input;

use Advertikon\Element\Input;

class Number extends Input {
    public function __construct() {
        parent::__construct();
        $this->attributes( 'type', 'number' );
    }
}