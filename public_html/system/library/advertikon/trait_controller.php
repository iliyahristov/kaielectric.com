<?php

/**
 * Controller functionality
 * @package Advertikon
 * @author Advertikon
 * @version 1.1.75  
 */

namespace Advertikon;

trait Trait_Controller {
	public function console() {
		$this->a->console->tail();
	}
}
