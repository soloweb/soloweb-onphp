<?php
/*****************************************************************************
 *   Copyright (C) 2006-2007, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-0.11.1.111 at 2007-12-18 18:27:01                    *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoRegionDAO extends StorableDAO
	{
		public function getTable()
		{
			return 'region';
		}
		
		public function getObjectName()
		{
			return 'Region';
		}
		
		public function getSequence()
		{
			return 'region_id';
		}
		
		public function uncacheLists()
		{
			StatisticVisitor::dao()->uncacheLists();
			StatisticQuery::dao()->uncacheLists();
			
			return parent::uncacheLists();
		}
	}
?>