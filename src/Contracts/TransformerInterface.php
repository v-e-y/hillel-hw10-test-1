<?php 

declare(strict_types=1);

namespace Hillel\Transformers\Interfaces;

interface TransformerInterface
{
    public function getSpeed(bool $withSign = false);

    public function getWeight(bool $withSign = false);

    public function getHeight(bool $withSign = false);

    public function setSpeed(float $speed): void;

    public function setWeight(float $weight): void;

    public function setHeight(float $height): void;
}