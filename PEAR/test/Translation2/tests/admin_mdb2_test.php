<?php
// $Id: admin_mdb2_test.php,v 1.3 2006/08/29 09:54:36 quipo Exp $

require_once 'admin_db_test_base.php';

class TestOfAdminContainerMDB2 extends TestOfAdminContainerDB {
    function TestOfAdminContainerMDB2($name='Test of Admin Container MDB2') {
        $this->UnitTestCase($name);
    }
    function setUp() {
        $driver = 'MDB2';
        $this->tr = Translation2_Admin::factory($driver, dbms::getDbInfo(), dbms::getParams());
    }
}

if (!defined('TEST_RUNNING')) {
    define('TEST_RUNNING', true);
    $test = &new TestOfAdminContainerMDB2();
    $test->run(new HtmlReporter());
}
?>