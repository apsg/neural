<?php

namespace Gacek\Neural\Interfaces;

interface Activation{
	
	/**
	 * Activation function
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	public function f($value);

	/**
	 * Derivative of activation function
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	public function df($value);
}