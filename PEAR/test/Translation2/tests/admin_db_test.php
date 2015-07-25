<?php
// $Id: admin_db_test.php,v 1.8 2007/01/30 13:15:26 quipo Exp $

require_once 'admin_db_test_base.php';

if (!defined('TEST_RUNNING')) {
    define('TEST_RUNNING', true);
    $test = &new TestOfAdminContainerDB();
    $test->run(new HtmlReporter());
}
?>