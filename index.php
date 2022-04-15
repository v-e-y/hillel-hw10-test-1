<?php

declare(strict_types=1);

use Hillel\Transformers\Transformer1;
use Hillel\Transformers\Transformer2;
use Hillel\Transformers\TransformerFactory;

require 'vendor/autoload.php';

// TODO delete this
echo '<pre>';

$TransFactory = new TransformerFactory();

$TransFactory->createTransformer1(5);

$TransFactory->addType(new Transformer1);
$TransFactory->addType(new Transformer2);

// var_dump($TransFactory);

