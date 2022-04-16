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

    /**
     * Get transformer characteristics
     * @return array // Transformer characteristics
     */
    public function getTransformerCharacteristics(): array
    {
        return [
            'speed' => $this->getSpeed(),
            'speedSign' => $this->getSpeedSign(),
            'weight' => $this->getWeight(),
            'weightSign' => $this->getWeightSign(),
            'height' => $this->getHeight(),
            'heightSign' => $this->getHeightSign()
        ];
    }

    /*
    * Getters
    */

    public function getSpeed(): float
    {
        return $this->speed;
    }

    public function getSpeedSign(): string
    {
        return $this->speedSign;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function getWeightSign(): string
    {
        return $this->weightSign;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getHeightSign(): string
    {
        return $this->heightSign;
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

    public function __toString()
    {
        $string = 'Transformer characteristics:<br>speed - %.1f %s,<br>weight - %.1f %s,<br>heigh - %.1f %s.';
        return sprintf(
            $string,
            $this->getSpeed(),
            $this->getSpeedSign(),
            $this->getWeight(),
            $this->getWeightSign(),
            $this->getHeight(),
            $this->getHeightSign()
        );
    }
}
