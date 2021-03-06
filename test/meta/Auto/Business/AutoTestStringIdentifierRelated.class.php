<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1 at 2011-02-09 18:30:06                           *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoTestStringIdentifierRelated extends IdentifiableObject
	{
		protected $test = null;
		
		public function __sleep()
		{
			return array('id', 'test');
		}
		
		/**
		 * @return TestStringIdentifier
		**/
		public function getTest()
		{
			return $this->test;
		}
		
		/**
		 * @return TestStringIdentifierRelated
		**/
		public function setTest(TestStringIdentifier $test)
		{
			$this->test = $test;
			
			return $this;
		}
		
		/**
		 * @return TestStringIdentifierRelated
		**/
		public function dropTest()
		{
			$this->test = null;
			
			return $this;
		}
	}
?>