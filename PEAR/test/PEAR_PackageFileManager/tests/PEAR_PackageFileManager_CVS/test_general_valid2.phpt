--TEST--
PEAR_PackageFileManager_Cvs, valid test 1
--SKIPIF--
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$packagexml->_options['addhiddenfiles'] = false;
$packagexml->_options['ignore'] = 
$packagexml->_options['include'] = false;
$packagexml->_options['packagefile'] = 'package.xml';
mkdir(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'CVS');
copy(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'testCVS'
    . DIRECTORY_SEPARATOR . 'testEntries',
    
    dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'CVS' .
    DIRECTORY_SEPARATOR . 'Entries');
$z = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'CVS' .
    DIRECTORY_SEPARATOR . 'Entries', 'a');
fwrite($z, "\n/unused/1.16/dummy timestamp//");
fclose($z);
copy(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'testCVS'
    . DIRECTORY_SEPARATOR . 'testEntries.Extra',
    
    dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'CVS' .
    DIRECTORY_SEPARATOR . 'Entries.Extra');
touch(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'CVS' .
    DIRECTORY_SEPARATOR . 'unused');
$res = $packagexml->dirList(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest');
$phpunit->assertEquals(
    array(
        dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest/test1.txt',
        dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest/test2.txt',
        dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest/.test',
    ),
    $res,
    'incorrect dir structure');
unlink(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'CVS' .
    DIRECTORY_SEPARATOR . 'Entries');
unlink(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'CVS' .
    DIRECTORY_SEPARATOR . 'Entries.Extra');
unlink(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'CVS' .
    DIRECTORY_SEPARATOR . 'unused');
rmdir(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footest' . DIRECTORY_SEPARATOR . 'CVS');
echo 'tests done';
?>
--EXPECT--
tests done