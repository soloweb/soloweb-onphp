<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1 at 2010-03-24 21:11:41                           *
 *   This file will never be generated again - feel free to edit.            *
 *****************************************************************************/

	final class TestSubItem extends AutoTestSubItem implements Prototyped, DAOConnected
	{
		/**
		 * @return TestSubItem
		**/
		public static function create()
		{
			return new self;
		}
		
		/**
		 * @return TestSubItemDAO
		**/
		public static function dao()
		{
			return Singleton::getInstance('TestSubItemDAO');
		}
		
		/**
		 * @return ProtoTestSubItem
		**/
		public static function proto()
		{
			return Singleton::getInstance('ProtoTestSubItem');
		}
		
		// your brilliant stuff goes here
	}
?>