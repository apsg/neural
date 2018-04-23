<?php

namespace Gacek\Neural;

use Phpml\Math\Matrix as MatrixBase;

class Matrix extends MatrixBase implements \ArrayAccess{
	
	/**
	 * Generate matrix of $rows x $columns size filled 
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

	// ------------------ ArrayAccess methods ----------------------

	public function offsetExists($offset) 
    { 
    	return isset($this->toArray()[$offset]);
    } 

	public function offsetSet($offset, $value) 
	{ 

	} 

	public function offsetGet($offset) 
	{ 
		return $this->toArray()[$offset];
	} 

	public function offsetUnset($offset) 
	{ 
		
	} 

}