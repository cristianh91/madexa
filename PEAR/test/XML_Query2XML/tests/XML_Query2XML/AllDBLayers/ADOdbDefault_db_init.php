<?php
/**This is included from unit tests to initialize an ADOdb connection.
*
* LICENSE:
* This source file is subject to version 2.1 of the LGPL
* that is bundled with this package in the file LICENSE.
*
* COPYRIGHT:
* Empowered Media
* http://www.empoweredmedia.com
* 481 Eighth Avenue Suite 1530
* New York, NY 10001
*
* @copyright Empowered Media 2006
* @license http://www.gnu.org/copyleft/lesser.html  LGPL Version 2.1
* @author Lukas Feiler <lukas.feiler@lukasfeiler.com>
* @package XML_Query2XML
* @version $Id: ADOdbDefault_db_init.php 257863 2008-04-18 23:50:27Z lukasfeiler $
*/

require_once dirname(dirname(__FILE__)) . '/settings.php';
require_once 'adodb/adodb.inc.php';
$db = NewADOConnection(DSN);
?>