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
	final class OqlGrammarRuleWrapper extends OqlGrammarRule
	{
		private $grammar	= null;
		private $ruleId		= null;
		
		/**
		 * @return OqlGrammarRuleWrapper
		**/
		public static function create()
		{
			return new self;
		}
		
		/**
		 * @return Grammar
		**/
		public function getGrammar()
		{
			return $this->grammar;
		}
		
		/**
		 * @return OqlGrammarRuleWrapper
		**/
		public function setGrammar(OqlGrammar $grammar)
		{
			$this->grammar = $grammar;
			
			return $this;
		}
		
		public function getRuleId()
		{
			return $this->ruleId;
		}
		
		/**
		 * @return OqlGrammarRuleWrapper
		**/
		public function setRuleId($ruleId)
		{
			$this->ruleId = $ruleId;
			
			return $this;
		}
		
		/**
		 * @return OqlGrammarRule
		**/
		public function getRule()
		{
			Assert::isNotNull($this->grammar, 'grammar must be set');
			Assert::isNotNull($this->ruleId, 'rule id must be set');
			
			return $this->grammar->get($this->ruleId);
		}
		
		/**
		 * @return OqlGrammarRuleWrapper
		**/
		protected function buildTerminals()
		{
			$this->getRule()->build();
			
			return $this;
		}
		
		protected function getTerminals()
		{
			return $this->getRule()->getTerminals();
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
			return $this->getRule()->process($tokenizer, $rootNode, $silent);
		}
	}
?>