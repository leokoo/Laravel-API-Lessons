<?php


namespace App\Acme\Transformers;


abstract class Transformer {

	/**
	 * Transform a collection of lessons
	 *
	 * @param $items
	 *
	 * @return array
	 */

	public function transformCollection(array $items)
	{
		return array_map([$this, 'transform'], $items);
	}

	public abstract function transform($item);

}