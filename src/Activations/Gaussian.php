<?php

namespace Gacek\Neural\Activations;

use Gacek\Neural\Interfaces\Activation;

class Gaussian implements Activation{
	
	public function f($v){
		return exp(-$v^2);
	}

	public function df($v){
		return -2*$v*exp(-$v^2);
	}
}