<?php
require_once "IO.php";
require_once "HashTable.php";
require_once "Loader.php";
require_once "TableObject.php";
require_once "Scanner.php";
require_once "Atom.php";


const SOURCE_ONE = __DIR__ . '/input/source1';
const SOURCE_TWO = __DIR__ . '/input/source2';
const SOURCE_THREE = __DIR__ . '/input/source3';

$source = IO::read(SOURCE_ONE);
//$source = IO::read(SOURCE_TWO);
//$source = IO::read(SOURCE_THREE);

$analizer = new Scanner();

$analizer->analyze($source);

$analizer->write();
