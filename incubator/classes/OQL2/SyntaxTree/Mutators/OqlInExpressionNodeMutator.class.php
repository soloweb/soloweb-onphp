<?php
/****************************************************************************
 *   Copyright (C) 2009 by Vladlen Y. Koshelev                              *
 *                                                                          *
 *   This program is free software; you can redistribute it and/or modify   *
 *   it under the terms of the GNU Lesser General Public License as         *
 *   published by the Free Software Foundation; either version 3 of the     *
 *   License, or (at your option) any later version.                        *
 *                                                                          *
 ****************************************************************************/

	/**
	 * @ingroup OQL
	**/
	final class OqlInExpressionNodeMutator extends OqlSyntaxNodeMutator
	{
		/**
		 * @return OqlInExpressionNodeMutator
		**/
		public static function me()
		{
			return Singleton::getInstance(__CLASS__);
		}
		
		/**
		 * @return OqlLogicalObjectNode
		**/
		public function process(OqlSyntaxNode $node, OqlSyntaxNode $rootNode)
		{
			$iterator = OqlSyntaxTreeRecursiveIterator::me();
			
			if (($field = $iterator->reset($node)) === null)
				return $node;
			
			if (($operator = $iterator->next()) === null)
				return $node;
			
			$values = array();
			do {
				$value = $iterator->next();
				
				if ($value)
					$values[] = $value->toValue();
				
				$comma = $iterator->next();
				Assert::isTrue(
					$comma == null || $comma->toValue() == ','
				);
			
			} while ($comma && $comma->toValue() == ',');
			
			if (
				count($values) == 1
				&& (($value = reset($values)) instanceof OqlPlaceholder)
			) {
				$expression = new InExpression(
					$field->toValue(),
					$value,
					$operator->toValue()
				);
			
			} else {
				$expression =
					$operator->toValue() == InExpression::IN
						? Expression::in($field->toValue(), $values)
						: Expression::notIn($field->toValue(), $values);
			}
			
			return OqlLogicalObjectNode::create()->setObject($expression);
		}
	}
?>