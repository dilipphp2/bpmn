<?php

/*
 * This file is part of KoolKode BPMN.
 *
 * (c) Martin Schröder <m.schroeder2007@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KoolKode\BPMN\Engine;

use KoolKode\Expression\ExpressionContextInterface;
use KoolKode\Expression\ExpressionInterface;

trait BasicAttributesTrait
{
	protected $name;
	
	protected $documentation;
	
	public function setName(ExpressionInterface $name = NULL)
	{
		$this->name = $name;
	}
	
	public function setDocumentation(ExpressionInterface $documentation = NULL)
	{
		$this->documentation = $documentation;
	}
	
	public function getValue(ExpressionInterface $exp = NULL, ExpressionContextInterface $context = NULL)
	{
		return ($exp === NULL || $context === NULL) ? NULL : $exp($context);
	}
	
	public function getStringValue(ExpressionInterface $exp = NULL, ExpressionContextInterface $context = NULL)
	{
		return ($exp === NULL || $context === NULL) ? '' : (string)$exp($context);
	}
}