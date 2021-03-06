--TEST--
Test for Console_CommandLine::fromXmlFile() method.
--SKIPIF--
<?php if(php_sapi_name()!='cli') echo 'skip'; ?>
--ARGS--
--help 2>&1
--FILE--
<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tests.inc.php';

$parser = Console_CommandLine::fromXmlFile(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'test.xml');
$parser->parse();

?>
--EXPECTF--
zip/unzip files

Usage:
  test [options]
  test [options] <command> [options] [args]

Options:
  -c choice, --choice=choice        choice option
  --list-choice                     lists valid choices for option choice
  -p password, --password=password  zip file password
  -v, --verbose                     turn on verbose output
  -h, --help                        show this help message and exit
  --version                         show the program version and exit

Commands:
  zip    zip given files in the destination file
  unzip  unzip given file in the destination dir
