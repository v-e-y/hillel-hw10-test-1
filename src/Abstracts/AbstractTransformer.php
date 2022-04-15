<?php

declare(strict_types=1);

namespace Hillel\Transformers\Abstracts;

abstract class AbstractTransformer
{
    protected float $speed;

    protected string $speedSign;

    protected float $weight;

    protected string $weightSign;

    protected float $height;

    protected string $heightSign;


    /*
    * Getters
    */

    public function getSpeed(bool $withSign = false): mixed
    {
        if ($withSign) {
            return [$this->speed, $this->speedSign];
        }

        return $this->speed;
    }

    public function getWeight(bool $withSign = false): mixed
    {
        if ($withSign) {
            return [$this->weight, $this->weightSign];
        }

        return $this->weight;
    }

    public function getHeight(bool $withSign = false): mixed
    {
        if ($withSign) {
            return [$this->height, $this->heightSign];
        }

        return $this->height;
    }

    /*
    * Setters
    */

    public function setSpeed(float $speed): void
    {
        if ($speed < 0) {
            throw new \Exception('Robot speed can`t be less then 0');
        }

        $this->speed = $speed;
    }

    public function setSpeedSign(string $speedSign): void
    {
        // Check data for equals allowed sign from config file or class property.

        $this->speedSign = $speedSign;
    }

    public function setWeight(float $weight): void
    {
        if ($weight < 0) {
            throw new \Exception('Robot weight can`t be less then 0');
        }

        $this->weight = $weight;
    }

    public function setWeightSign(string $weightSign): void
    {
        // Check data for equals allowed sign from config file or class property

        $this->weightSign = $weightSign;
    }

    public function setHeight(float $height): void
    {
        if ($height < 0) {
            throw new \Exception('Robot height can`t be less then 0');
        }

        $this->height = $height;
    }

    public function setHeightSign(string $heightSign): void
    {
        // Check data for equals allowed sign from config file or class property

        $this->heightSign = $heightSign;
    }

}