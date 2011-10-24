<?php
/***************************************************************************
 *   Copyright (C) 2008 by Ivan Y. Khvostishkov                            *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU Lesser General Public License as        *
 *   published by the Free Software Foundation; either version 3 of the    *
 *   License, or (at your option) any later version.                       *
 *                                                                         *
 ***************************************************************************/

	final class HtmlUrl extends ApplicationUrl
	{
		/**
		 * @return HtmlUrl
		**/
		public static function create()
		{
			return new self;
		}
		
		public function __toString()
		{
			return $this->toHtmlString();
		}

		public function toHtmlString()
		{
			return htmlspecialchars($this->toString());
		}
	}
?>
