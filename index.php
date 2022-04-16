<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Hillel\Transformers\MergeTransformer;
use Hillel\Transformers\Transformer1;
use Hillel\Transformers\Transformer2;
use Hillel\Transformers\TransformerFactory;

require 'vendor/autoload.php';

// TODO delete this
echo '<pre>';

$TransFactory = new TransformerFactory();

$TransFactory->addType(new Transformer1);
$TransFactory->addType(new Transformer2);

$transformers = $TransFactory->createTransformer2(2);

var_dump(new MergeTransformer, new Transformer1, new Transformer2);

echo '<br>' . PHP_EOL;

$mergeTrans = new MergeTransformer;

echo 'Base merge trans <br>';
echo $mergeTrans . '<br>' . PHP_EOL;

echo 'Add trans 1 <br>';
$mergeTrans->addTransformer(new Transformer1);

echo $mergeTrans . '<br>' . PHP_EOL;

echo 'Add trans 2 twice <br>';
$mergeTrans->addTransformer($TransFactory->createTransformer2(2));

echo $mergeTrans . '<br>' . PHP_EOL;