<?php

namespace Gacek\Neural;

class Network{

	protected $iN;
	protected $hN;
	protected $oN;

	protected $weights_ih;
	protected $weights_ho;

	protected $bias_h;
	protected $bias_o;

	public function __construct($input_number, $hidden_number, $output_number){
		$this->iN = $input_number;
		$this->hN = $hidden_number;
		$this->oN = $output_number;

		$this->weights_ih = Matrix::random($hidden_number, $input_number);
		$this->weights_ho = Matrix::random($output_number, $hidden_number);

		$this->bias_h = Matrix::random($hidden_number,1);
		$this->bias_o = Matrix::random($output_number, 1);
	}



}