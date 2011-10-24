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
	class OqlRepetitionRule extends OqlDecoratedRule
	{
		/**
		 * @return OqlRepetitionRule
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
			Assert::isNotNull($this->rule);
			
			$childNodes = array();
			
			if ($this->match($tokenizer->peek())) {
				while ($node = $this->rule->process($tokenizer, $rootNode, $silent))
					$childNodes[] = $node;
			}
			
			if ($childNodes) {
				if (count($childNodes) == 1)
					return reset($childNodes);
				else
					return OqlNonterminalNode::create()->setChilds($childNodes);
			
			} elseif (!$silent) {
				// FIXME: error message
				$this->raiseError($tokenizer, 'expected');
			}
			
			return null;
		}
	}
?>