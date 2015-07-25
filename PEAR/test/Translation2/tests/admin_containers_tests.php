<?php
// $Id: admin_containers_tests.php,v 1.4 2004/11/19 17:09:21 quipo Exp $

require_once 'simple_include.php';
require_once 'translation2_admin_include.php';

class AdminContainersTests extends GroupTest {
    function AdminContainersTests() {
        $this->GroupTest('Admin Containers Tests');
        $this->addTestFile('admin_db_test.php');
        $this->addTestFile('admin_mdb_test.php');
        $this->addTestFile('admin_mdb2_test.php');
        //can't really test .mo files because any change requires an Apache restart
        //$this->addTestFile('admin_gettext_mo_test.php');
        $this->addTestFile('admin_gettext_po_test.php');
        $this->addTestFile('admin_xml_test.php');
    }
}

if (!defined('TEST_RUNNING')) {
    define('TEST_RUNNING', true);
    $test = &new AdminContainersTests();
    $test->run(new HtmlReporter());
}
?>