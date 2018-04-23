<?php

namespace Gacek\Neural;

class Network{


	protected $iN;
	protected $hN;
	protected $oN;

	public function __construct($input_number, $hidden_number, $output_number){
		$this->iN = $input_number;
		$this->hN = $hidden_number;
		$this->oN = $output_number;
	}



}