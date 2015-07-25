<?php
/**This is included from unit tests to skip the test if I18N_UnicodeString
* is not available.
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
* @version $Id: skipif.php 222764 2006-11-03 15:53:01Z lukasfeiler $
*/

if (!@include_once 'I18N/UnicodeString.php') {
    print 'skip could not find I18N/UnicodeString.php';
    exit;
}
?>