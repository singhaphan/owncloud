<?php
/**
 * ownCloud - files_texteditor
 *
 * @author Tom Needham
 * @copyright 2011 Tom Needham contact@tomneedham.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

// Init owncloud
require_once('../../../lib/base.php');


// Check if we are a user
OC_JSON::checkLoggedIn();

// Get the path from GET
$path = isset($_GEt['path']) ? $_GET['path'] : '';

if($path != '')
{
	// Find the mtime
	$mtime = OC_Filesystem::filemtime($path);
	if($mtime)
	{
		OC_JSON::success(array('data' => array('path' => $path, 'mtime' => $mtime)));
	}
	else
	{
		OC_JSON::error();
	}	
}
else
{
	OC_JSON::error();	
}