<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Hillel\Transformers\Transformer1;
use Hillel\Transformers\Transformer2;
use Hillel\Transformers\TransformerFactory;

require 'vendor/autoload.php';

// TODO delete this
echo '<pre>';

$TransFactory = new TransformerFactory();



$TransFactory->addType(new Transformer1);
$TransFactory->addType(new Transformer2);

var_dump($TransFactory->createTransformer1(5));

// var_dump($TransFactory);

