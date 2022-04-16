<?php 

declare(strict_types=1);

namespace Hillel\Transformers\Interfaces;

interface TransformerInterface
{
    public function getSpeed(): float;

    public function getWeight(): float;

    public function getHeight(): float;

    public function getSpeedSign(): string;

    public function getWeightSign(): string;

    public function getHeightSign(): string;

    public function setSpeed(float $speed): void;

    public function setWeight(float $weight): void;

    public function setHeight(float $height): void;

    public function setSpeedSign(string $speed): void;

    public function setWeightSign(string $weight): void;

    public function setHeightSign(string $height): void;

    public function getTransformerCharacteristics(): array;
}