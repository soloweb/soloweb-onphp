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
	final class OqlGreedyAlternationRule extends OqlAlternationRule
	{
		/**
		 * @return OqlGreedyAlternationRule
		**/
		public static function create()
		{
			return new self;
		}
		
		/**
		 * @return OqlSyntaxNode
		**/
		protected function parse(
			OqlTokenizer $tokenizer,
			OqlSyntaxNode $rootNode,
			$silent = false
		)
		{
			$maxIndex = -1;
			$maxNode = null;
			$maxRule = null;
			
			if ($this->match($tokenizer->peek())) {
				foreach ($this->list as $rule) {
					$index = $tokenizer->getIndex();
					
					if (
						($node = $rule->parse($tokenizer, $rootNode, true))
						&& $maxIndex < $tokenizer->getIndex()
					) {
						$maxIndex = $tokenizer->getIndex();
						$maxNode = $node;
						$maxRule = $rule;
					}
					
					$tokenizer->setIndex($index);
				}
			}
			
			if ($maxNode !== null) {
				if ($maxRule->getMutator())
					$maxNode = $maxRule->getMutator()->process($maxNode, $rootNode);
				
				$tokenizer->setIndex($maxIndex);
			
			// FIXME: error message
			} elseif (!$silent)
				$this->raiseError($tokenizer, 'expected');
			
			return $maxNode;
		}
	}
?>