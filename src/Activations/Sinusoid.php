<?php

namespace Gacek\Neural\Activations;

use Gacek\Neural\Interfaces\Activation;

class Sinusoid implements Activation{
	
	public function f($v){
		return sin($v);
	}

	public function df($v){
		return cos($v);
	}
}