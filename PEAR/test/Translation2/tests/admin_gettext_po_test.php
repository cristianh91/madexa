<?php
// $Id: admin_gettext_po_test.php,v 1.3 2007/11/10 00:02:50 quipo Exp $

require_once 'admin_gettext_test_base.php';

if (!defined('TEST_RUNNING')) {
    define('TEST_RUNNING', true);
    $test = &new TestOfAdminContainerGettextPO();
    $test->run(new HtmlReporter());
}
?>