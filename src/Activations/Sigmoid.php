<?php

namespace Gacek\Neural\Activations;

use Gacek\Neural\Interfaces\Activation;

class Sigmoid implements Activation{
	
	public function f($v){
		return 1 / (1 + exp(-$v));
	}

	public function df($v){
		return $v * (1 - $v);
	}

}