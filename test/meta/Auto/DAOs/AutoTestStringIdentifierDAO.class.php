<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1 at 2010-03-24 21:11:41                           *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoTestStringIdentifierDAO extends StorableDAO
	{
		public function getTable()
		{
			return 'test_string_identifier';
		}
		
		public function getObjectName()
		{
			return 'TestStringIdentifier';
		}
		
		public function getSequence()
		{
			return 'test_string_identifier_id';
		}
		
		public function uncacheLists()
		{
			TestStringIdentifierRelated::dao()->uncacheLists();
			
			return parent::uncacheLists();
		}
	}
?>