<?php
require_once "IO.php";
require_once "HashTable.php";
require_once "Loader.php";
require_once "TableObject.php";
require_once "Analizer.php";
require_once "Atom.php";


const SOURCE_ONE = __DIR__ . '/input/source1';

$source = IO::read(SOURCE_ONE);

$analizer = new Analizer();

$analizer->analize($source);

$analizer->write();
