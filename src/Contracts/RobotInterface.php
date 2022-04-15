<?php 

declare(strict_types=1);

namespace Hillel\Robots\Interfaces;

interface RobotInterface
{
    public function getSpeed(): float;

    public function getWeight(): float;

    public function getHeight(): float;

    public function setSpeed(): float;

    public function setWeight(): float;

    public function setHeight(): float;
}