<?php
// $Id: db_test.php,v 1.9 2006/08/29 09:54:36 quipo Exp $

require_once 'db_test_base.php';

if (!defined('TEST_RUNNING')) {
    define('TEST_RUNNING', true);
    $test = &new TestOfContainerDB();
    $test->run(new HtmlReporter());
}
?>