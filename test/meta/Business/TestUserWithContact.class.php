<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1 at 2010-03-24 21:11:41                           *
 *   This file will never be generated again - feel free to edit.            *
 *****************************************************************************/

	final class TestUserWithContact extends AutoTestUserWithContact implements Prototyped, DAOConnected
	{
		/**
		 * @return TestUserWithContact
		**/
		public static function create()
		{
			return new self;
		}
		
		/**
		 * @return TestUserWithContactDAO
		**/
		public static function dao()
		{
			return Singleton::getInstance('TestUserWithContactDAO');
		}
		
		/**
		 * @return ProtoTestUserWithContact
		**/
		public static function proto()
		{
			return Singleton::getInstance('ProtoTestUserWithContact');
		}
		
		// your brilliant stuff goes here
	}
?>