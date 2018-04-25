<?php

namespace Gacek\Neural\Activations;

use Gacek\Neural\Interfaces\Activation;

class Identity implements Activation{
	
	public function f($v){
		return $v;
	}

	public function df($v){
		return 1;
	}
}