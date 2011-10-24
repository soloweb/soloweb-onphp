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
	class OqlAlternationRule extends OqlListedRule
	{
		/**
		 * @return OqlAlternationRule
		**/
		public static function create()
		{
			return new self;
		}
		
		/**
		 * @return OqlAlternationRule
		**/
		protected function buildTerminals()
		{
			foreach ($this->list as $rule) {
				$rule->build();
				
				$this->terminals = array_merge(
					$this->terminals,
					$rule->getTerminals()
				);
			}
			
			return $this;
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
			if ($this->match($tokenizer->peek())) {
				foreach ($this->list as $rule) {
					if ($node = $rule->process($tokenizer, $rootNode, true))
						return $node;
				}
			}
			
			// FIXME: error message
			if (!$silent)
				$this->raiseError($tokenizer, 'expected');
			
			return null;
		}
	}
?>