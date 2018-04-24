<?php

namespace Gacek\Neural;

use Phpml\Math\Matrix as MatrixBase;
use Gacek\Neural\Interfaces\Activation;

class Matrix extends MatrixBase implements \ArrayAccess{
	
	/**
	 * Generate matrix of size $rows x $columns filled 
	 * with zeros
	 * @param  [type] $rows    [description]
	 * @param  [type] $columns [description]
	 * @return [type]          [description]
	 */
	public static function zeros($rows, $columns): self
	{
		$fill = array_fill(0, $rows, array_fill(0, $columns, 0));
		return new self($fill);
	}

	/**
	 * Generate matrix of size $rows x $columns filled 
	 * with random (float) numbers ranging 
	 * from $min to $max
	 * @param  int  	$rows    number of rows
	 * @param  int  	$columns number of columns
	 * @param  float 	$min     random range min
	 * @param  float 	$max     random range max
	 * @return Matrix            new matrix
	 */
	public static function random(int $rows, int $columns, float $min = 0, float $max = 1): self 
	{

		if($min >= $max){
			throw new \Exception("Wrong min and max values");
		}

		$fill = array_fill(0, $rows, array_fill(0, $columns, 0));
		for($i=0; $i<count($fill); $i++){
			for($j=0; $j<count($fill[0]); $j++){
				$fill[$i][$j] = static::rand_float($min, $max);
			}
		}

		return new self($fill);
	}

	/**
	 * Generate random floating point number in provided range
	 * @param  integer $st_num  [description]
	 * @param  integer $end_num [description]
	 * @param  integer $mul     [description]
	 * @return [type]           [description]
	 */
	protected static function rand_float($st_num=0,$end_num=1,$mul=1000000): float
	{
		if ($st_num>$end_num) return false;
		return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
	}

	/**
	 * Use callable function on each element of the matrix.
	 * @param  callable $function [description]
	 * @return [type]             [description]
	 */
	public function map(callable $function): self
	{
		$mapped = $this->toArray();

		for ($i = 0; $i < count($mapped); $i++) {
            for ($j = 0; $j < count($mapped[0]); $j++) {
            	$mapped[$i][$j] = $function($mapped[$i][$j]);
            }
        }

        return new self($mapped);
	}

	// ------------------ ArrayAccess methods ----------------------

	public function offsetExists($offset) 
	{ 
		return isset($this->toArray()[$offset]);
	} 

	public function offsetSet($offset, $value) 
	{ 
		// Unable to implement since MatrixBase has private properties
	} 

	public function offsetGet($offset) 
	{ 
		return $this->toArray()[$offset];
	} 

	public function offsetUnset($offset) 
	{ 
		// Unable to implement since MatrixBase has private properties
	} 

}