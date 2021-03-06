<?php

namespace Gacek\Neural;

use Gacek\Neural\Interfaces\Activation;
use Gacek\Neural\Activations\Sigmoid;
use Gacek\Neural\Exceptions\NeuralNetworkException;

/**
 * Simple 3-layer neural network
 */
class Network{

	/**
	 * Number of input nodes
	 * @var [type]
	 */
	protected $iN;

	/**
	 * Number of hidden layer nodes
	 * @var [type]
	 */
	protected $hN;

	/**
	 * Number of output nodes
	 * @var [type]
	 */
	protected $oN;

	/**
	 * Weights matrix for input-hidden transformation
	 * @var [type]
	 */
	protected $weights_ih;

	/**
	 * Weights matrix for hidden-output transformation
	 * @var [type]
	 */
	protected $weights_ho;

	/**
	 * Bias vector for hidden layer nodes
	 * @var [type]
	 */
	protected $bias_h;

	/**
	 * Bias vector for output layer nodes
	 * @var [type]
	 */
	protected $bias_o;

	/**
	 * Activation function
	 * @var [type]
	 */
	protected $activation;

	/**
	 * Learning rate
	 * @var float
	 */
	protected $learning_rate = 0.1;

	public function __construct($input_number, $hidden_number, $output_number){
		$this->iN = $input_number;
		$this->hN = $hidden_number;
		$this->oN = $output_number;

		$this->weights_ih = Matrix::random($hidden_number, $input_number);
		$this->weights_ho = Matrix::random($output_number, $hidden_number);

		$this->bias_h = Matrix::random($hidden_number,1);
		$this->bias_o = Matrix::random($output_number, 1);

		$this->activation = new Sigmoid();
	}

	/**
	 * Set activation function for this network
	 * @param Activation $activation [description]
	 */
	public function setActivation(Activation $activation){
		$this->activation = $activation;
	}

	/**
	 * Set learning rate
	 * @param float $rate [description]
	 */
	public function setLearnignRate(float $rate){
		if($rate <0 || $rate > 1){
			throw new NeuralNetworkException('Learning rate must be in range [0,1]');
		}

		$this->learning_rate = $rate;
	}

	/**
	 * Compute output based on provided input array
	 * @param  array  $input_array Inputs
	 * @return array               Outputs
	 */
	public function predict(array $input_array): array
	{
		if(count($input_array) != $this->iN){
			throw new NeuralNetworkException('Array passed for prediction has wrong number of arguments.');
		}

		$inputs = Matrix::fromFlatArray($input_array);

		$hidden = $this->weights_ih->multiply($inputs)
			->add($this->bias_h);

		// Dealing with self-s
		$hidden = (new Matrix($hidden->toArray()))->map([$this->activation, 'f']);

		$output = $this->weights_ho->multiply($hidden)
			->add($this->bias_o);

		// Dealing with self-s
		$output = (new Matrix($output->toArray()))->map([$this->activation, 'f']);

	    return $output->vectorize();
	  }


	public function train($inputs, $targets){
		// TODO
	}

}