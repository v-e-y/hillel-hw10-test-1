<?php

declare(strict_types=1);

use Hillel\Transformers\MergeTransformer;
use Hillel\Transformers\Transformer1;
use Hillel\Transformers\Transformer2;
use Hillel\Transformers\TransformerFactory;

require 'vendor/autoload.php';

// TODO delete this
echo '<pre>';

$transFactory = new TransformerFactory();

$transFactory->addType(new Transformer1);
$transFactory->addType(new Transformer2);

$transformers = $transFactory->createTransformer2(2);

// var_dump(new MergeTransformer, new Transformer1, new Transformer2);

echo '<br>' . PHP_EOL;

$mergeTrans = new MergeTransformer;

echo 'Base merge trans <br>';
echo $mergeTrans . '<br>' . PHP_EOL;

echo 'Add trans 1 <br>';
$mergeTrans->addTransformer(new Transformer1);

echo $mergeTrans . '<br>' . PHP_EOL;

echo 'Add trans 2 twice <br>';
$mergeTrans->addTransformer($transFactory->createTransformer2(2));

echo $mergeTrans . '<br>' . PHP_EOL;

$transFactory->addType($mergeTrans);

$transformer = reset($transFactory->createMergeTransformer(1));

echo $transformer->getSpeed() . PHP_EOL; 
echo $transformer->getWeight() . PHP_EOL;
echo $transformer->getHeight() . PHP_EOL;