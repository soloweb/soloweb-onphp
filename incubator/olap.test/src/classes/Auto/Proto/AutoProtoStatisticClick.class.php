<?php
/*****************************************************************************
 *   Copyright (C) 2006-2007, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-0.11.1.111 at 2007-12-18 18:27:01                    *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoProtoStatisticClick extends AbstractProtoClass
	{
		protected function makePropertyList()
		{
			return array(
				'id' => LightMetaProperty::fill(new LightMetaProperty(), 'id', null, 'identifier', 'StatisticClick', null, true, true, false, null, null),
				'query' => LightMetaProperty::fill(new LightMetaProperty(), 'query', 'query_id', 'identifier', 'StatisticQuery', null, true, false, false, 1, null),
				'when' => LightMetaProperty::fill(new LightMetaProperty(), 'when', null, 'timestamp', 'Timestamp', null, true, true, false, null, null),
				'site' => LightMetaProperty::fill(new LightMetaProperty(), 'site', null, 'string', null, null, true, true, false, null, null)
			);
		}
	}
?>