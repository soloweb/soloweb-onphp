<?php
/*****************************************************************************
 *   Copyright (C) 2006-2007, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-0.9.300 at 2007-05-15 15:33:33                       *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	$schema = new DBSchema();
	
	$schema->
		addTable(
			DBTable::create('statistic_visitor')->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::BIGINT)->
					setNull(false),
					'id'
				)->
				setPrimaryKey(true)->
				setAutoincrement(true)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::TIMESTAMP)->
					setNull(false),
					'when'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER),
					'region_id'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER),
					'ip'
				)
			)
		);
	
	$schema->
		addTable(
			DBTable::create('statistic_query')->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::BIGINT)->
					setNull(false),
					'id'
				)->
				setPrimaryKey(true)->
				setAutoincrement(true)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::TEXT)->
					setNull(false),
					'query'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::VARCHAR)->
					setNull(false)->
					setSize(100),
					'media'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::TIMESTAMP)->
					setNull(false),
					'when'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER)->
					setNull(false),
					'found'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER),
					'region_id'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER),
					'ip'
				)
			)
		);
	
	$schema->
		addTable(
			DBTable::create('statistic_click')->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::BIGINT)->
					setNull(false),
					'id'
				)->
				setPrimaryKey(true)->
				setAutoincrement(true)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::BIGINT)->
					setNull(false),
					'query_id'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::TIMESTAMP)->
					setNull(false),
					'when'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::TEXT)->
					setNull(false),
					'site'
				)
			)
		);
	
	$schema->
		addTable(
			DBTable::create('region')->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER)->
					setNull(false),
					'id'
				)->
				setPrimaryKey(true)->
				setAutoincrement(true)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::VARCHAR)->
					setNull(false)->
					setSize(255),
					'name'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::VARCHAR)->
					setSize(100),
					'country'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER),
					'parent_id'
				)
			)
		);
	
	// statistic_visitor.region_id -> region.id
	$schema->
		getTableByName('statistic_visitor')->
		getColumnByName('region_id')->
		setReference(
			$schema->
				getTableByName('region')->
				getColumnByName('id'),
				ForeignChangeAction::restrict(),
				ForeignChangeAction::cascade()
			);
	
	// statistic_query.region_id -> region.id
	$schema->
		getTableByName('statistic_query')->
		getColumnByName('region_id')->
		setReference(
			$schema->
				getTableByName('region')->
				getColumnByName('id'),
				ForeignChangeAction::restrict(),
				ForeignChangeAction::cascade()
			);
	
	// statistic_click.query_id -> statistic_query.id
	$schema->
		getTableByName('statistic_click')->
		getColumnByName('query_id')->
		setReference(
			$schema->
				getTableByName('statistic_query')->
				getColumnByName('id'),
				ForeignChangeAction::restrict(),
				ForeignChangeAction::cascade()
			);
	
	// region.parent_id -> region.id
	$schema->
		getTableByName('region')->
		getColumnByName('parent_id')->
		setReference(
			$schema->
				getTableByName('region')->
				getColumnByName('id'),
				ForeignChangeAction::restrict(),
				ForeignChangeAction::cascade()
			);
	
?>