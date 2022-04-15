<?php

declare(strict_types=1);

namespace Hillel\Transformers;

use Hillel\Transformers\Abstracts\AbstractTransformer;
use Hillel\Transformers\Interfaces\TransformerInterface;

class Transformer2 extends AbstractTransformer implements TransformerInterface
{
    protected float $speed = 17;

    protected string $speedSign = 'km/h';

    protected float $weight = 1200;

    protected string $weightSign = 'kg';

    protected float $height = 3;

    protected string $heightSign = 'm';
}