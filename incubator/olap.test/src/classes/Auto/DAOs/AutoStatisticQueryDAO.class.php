<?php
/*****************************************************************************
 *   Copyright (C) 2006-2007, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-0.11.1.111 at 2007-12-18 18:27:01                    *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoStatisticQueryDAO extends StorableDAO
	{
		public function getTable()
		{
			return 'statistic_query';
		}
		
		public function getObjectName()
		{
			return 'StatisticQuery';
		}
		
		public function getSequence()
		{
			return 'statistic_query_id';
		}
		
		public function uncacheLists()
		{
			StatisticClick::dao()->uncacheLists();
			
			return parent::uncacheLists();
		}
	}
?>