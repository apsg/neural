<?php

namespace Gacek\Neural\Activations;

use Gacek\Neural\Interfaces\Activation;

class Tanh implements Activation{
	
	public function f($v){
		return tanh($v);
	}

	public function df($v){
		return 1 - ($v * $v);
	}
}