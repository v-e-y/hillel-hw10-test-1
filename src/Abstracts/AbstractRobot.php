<?php

declare(strict_types=1);

namespace Hillel\Robots\Abstracts;

abstract class AbstractRobot
{
    protected array $speed;

    protected float $weight;

    protected string $weightSight;

    protected float $height;

    protected string $heightSight;


    /*
    * Getters
    */

    public function getSpeed(bool $justValue = true): array
    {
        if (! $justValue) {
            return $this->speed;
        }

        return $this->speed['value'];
    }

    public function getWeight(bool $justValue = true): float
    {
        if (! $justValue) {
            return $this->weight;
        }

        return $this->weight['value'];
    }

    public function getHeight(bool $justValue = true): float
    {
        if (! $justValue) {
            return $this->height;
        }

        return $this->height['value'];
    }

    /*
    * Setters
    */

    public function setSpeed(float $speed, string $sight): void
    {
        if ($speed < 0) {
            throw new \Exception('Robot speed can`t be less then 0');
        }

        $this->speed = $speed;
    }

    public function setWeight(float $weight, string $sight): void
    {
        if ($weight < 0) {
            throw new \Exception('Robot weight can`t be less then 0');
        }

        $this->weight = $weight;
    }

    public function setHeight(float $height, string $sight): void
    {
        if ($height < 0) {
            throw new \Exception('Robot height can`t be less then 0');
        }

        $this->height = $height;
    }

}