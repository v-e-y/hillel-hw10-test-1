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

print_r($transFactory->createTransformer1(5));
print_r($transFactory->createTransformer2(2));

$mergeTrans = new MergeTransformer();
$mergeTrans->addTransformer(new Transformer2);
$mergeTrans->addTransformer($transFactory->createTransformer2(2));

$transFactory->addType($mergeTrans);

$transformer = reset($transFactory->createMergeTransformer(1));

echo$transformer;
echo '<br>';
echo $transformer->getSpeed() . PHP_EOL; 
echo $transformer->getWeight() . PHP_EOL;
echo $transformer->getHeight() . PHP_EOL;

