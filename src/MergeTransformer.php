<?php

declare(strict_types=1);

namespace Hillel\Transformers;

use Hillel\Transformers\Abstracts\AbstractTransformer;
use Hillel\Transformers\Interfaces\TransformerInterface;

class MergeTransformer extends AbstractTransformer implements TransformerInterface
{
    protected float $speed = 10;

    protected string $speedSign = 'km/h';

    protected float $weight = 1500;

    protected string $weightSign = 'kg';

    protected float $height = 5;

    protected string $heightSign = 'm';

    /**
     * Merge Transformers
     * @param [array/TransformerInterface] $transformerToMerge
     * @return void
     */
    public function addTransformer($transformerToMerge): void
    {
        if (is_array($transformerToMerge)) {
            foreach ($transformerToMerge as $transformer) {
                $this->merge($transformer);
            }
        }

        if ($transformerToMerge instanceof TransformerInterface) {
            $this->merge($transformerToMerge);
        }
    }

    /**
     * Merge $this transformer with given one.
     * @param TransformerInterface $transformerToMerge
     * @return void
     */
    private function merge(TransformerInterface $transformerToMerge): void
    {
        if (array_keys(get_object_vars($this)) !== array_keys($transformerToMerge->getTransformerCharacteristics())) {
            throw new \Exception('Transformers property, not values, should be equal');
        }

        foreach ($transformerToMerge->getTransformerCharacteristics() as $paramName => $paramValue) {
            if (is_string($paramValue)) {
                // TODO Check equals of signs
                continue;
            }

            if ($paramName === 'speed') {
                $this->$paramName = ($this->$paramName < $paramValue) ? $this->$paramName : $paramValue;
                continue;
            }

            $this->$paramName =  $this->$paramName + $paramValue;
        }
    }
}
