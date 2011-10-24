<?php
/***************************************************************************
 *   Copyright (C) 2008 by Tsyrulnik Y. Viatcheslav                        *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU Lesser General Public License as        *
 *   published by the Free Software Foundation; either version 3 of the    *
 *   License, or (at your option) any later version.                       *
 *                                                                         *
 ***************************************************************************/

	final class GoogleGeoPlaceMark implements Identifiable
	{
		protected $id = null;
		protected $address = null;
		protected $addressDetails = null;
		protected $point = null;
		
		/**
		 * Build object from simpleXMLElement
		 * 
		 * @param SimpleXMLElement $object
		 * @return GoogleGeoPlaceMark
		**/
		public static function createFromSimpleXml(SimpleXMLElement $object)
		{
			$instance = new GoogleGeoPlaceMark();
			
			list($lng, $lat, $z) = explode(',', $object->Point->coordinates);
			
			$instance->
				setId((string) $object->attributes()->id)->
				setAddress((string) $object->address)->
				setPoint(
					new GoogleGeoPoint((float) $lat, (float) $lng, (float) $z)
				)->
				setAddressDetails(
					GoogleGeoAddressDetail::createFromSimpleXml(
						$object->AddressDetails
					)
				);
			
			return $instance;
		}
		
		/**
		 * @param string $id
		 * @return GoogleGeoPlaceMark
		**/
		public function setId($id)
		{
			$this->id = $id;
			return $id;
		}
		
		/**
		 * @return string
		**/
		public function getId()
		{
			return $this->id;
		}
		
		/**
		 * @param string $adr
		 * @return GoogleGeoPlaceMark
		**/
		public function setAddress($address)
		{
			$this->address = $address;
			return $this;
		}
		
		/**
		 * @return string
		**/
		public function getAddress()
		{
			return $this->address;
		}
		
		/**
		 * @param GoogleGeoAddressDetail $details
		 * @return GoogleGeoPlaceMark
		**/
		public function setAddressDetails(GoogleGeoAddressDetail $details)
		{
			$this->addressDetails = $details;
			return $this;
		}
		
		/**
		 * @return GoogleGeoAddressDetail
		**/
		public function getAddressDetails()
		{
			return $this->addressDetails;
		}
		
		/**
		 * @param GoogleGeoPoint $point
		 * @return GoogleGeoPlaceMark
		**/
		public function setPoint(GoogleGeoPoint $point)
		{
			$this->point = $point;
			return $this;
		}
		
		/**
		 * @return GoogleGeoPoint
		**/
		public function getPoint()
		{
			return $this->point;
		}
	}
?>