<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1 at 2010-03-24 21:11:41                           *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoProtoTestUserWithContact extends AbstractProtoClass
	{
		protected function makePropertyList()
		{
			return array(
				'id' => LightMetaProperty::fill(new LightMetaProperty(), 'id', null, 'integerIdentifier', 'TestUserWithContact', 8, true, true, false, null, null),
				'name' => LightMetaProperty::fill(new LightMetaProperty(), 'name', null, 'string', null, 255, true, true, false, null, null),
				'surname' => LightMetaProperty::fill(new LightMetaProperty(), 'surname', null, 'string', null, 255, false, true, false, null, null),
				'contacts' => InnerMetaProperty::fill(new InnerMetaProperty(), 'contacts', 'contacts_id', 'identifier', 'TestContactValue', null, true, false, true, 1, null)
			);
		}
	}
?>