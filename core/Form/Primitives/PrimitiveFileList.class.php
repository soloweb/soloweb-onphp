<?php
/***************************************************************************
 *   Copyright (C) 2010 by Kutcurua Georgy Tamazievich                     *
 *   email: g.kutcurua@gmail.com, icq: 723737, jabber: soloweb@jabber.ru   *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU Lesser General Public License as        *
 *   published by the Free Software Foundation; either version 3 of the    *
 *   License, or (at your option) any later version.                       *
 *                                                                         *
 ***************************************************************************/
/* $Id$ */

	class PrimitiveFileList extends BasePrimitive {

		private $originalName		= null;
		private $mimeType			= null;

		private $allowedMimeTypes	= array();
		
		public function getOriginalName()
		{
			return $this->originalName;
		}

		public function getMimeType()
		{
			return $this->mimeType;
		}

		/**
		 * @return PrimitiveFiles
		**/
		public function clean()
		{
			$this->originalName = null;
			$this->mimeType = null;

			return parent::clean();
		}

		/**
		 * @throws WrongArgumentException
		 * @return PrimitiveFiles
		**/
		public function setAllowedMimeTypes($mimes)
		{
			Assert::isArray($mimes);

			$this->allowedMimeTypes = $mimes;

			return $this;
		}

		/**
		 * @throws WrongArgumentException
		 * @return PrimitiveFiles
		**/
		public function addAllowedMimeType($mime)
		{
			Assert::isString($mime);

			$this->allowedMimeTypes[] = $mime;

			return $this;
		}

		public function getAllowedMimeTypes()
		{
			return $this->allowedMimeTypes;
		}

		public function import(array $scope)
		{
			if (
				!BasePrimitive::import($scope)
				|| !is_array($scope[$this->name]['tmp_name'])
				|| (
					isset($scope[$this->name], $scope[$this->name]['error'])
					&& $scope[$this->name]['error'] == UPLOAD_ERR_NO_FILE
				)
			)
				return null;
				
			$this->mimeType = $scope[$this->name]['type'];
			$this->value = $scope[$this->name]['tmp_name'];
			$this->originalName = $scope[$this->name]['name'];

			return true;
		}

		public function exportValue()
		{
			throw new UnimplementedFeatureException();
		}

		public function copyTo($path, $name)
		{
			Assert::isArray($name, 'name must bu is array');

			Assert::isFalse( count($this->value) == count($name), 'name must be a correct array');

			$this->name = $name;

			return $this->copyToPath($path);
		}

		public function copyToPath($path)
		{

			if (is_writable(dirname($path))) {
				foreach ( $this->value as $key => $tmp_file ) {
					if( ! move_uploaded_file($tmp_file, $path.$this->name[$key]) ) {
						return false;
					}
				}
				return true;
			} else
				throw new WrongArgumentException(
					"can not move files to '{$path}'"
				);
		}

	}


?>