<?php

declare(strict_types=1);

namespace Hillel\Transformers;

use Hillel\Transformers\Interfaces\TransformerInterface;

final class TransformerFactory
{
    // Array with Transformers objects
    private array $transformerToBuild;

    /**
     * Add transformers for build or just store inside factory
     * @param TransformerInterface $transformer
     * @return void
     */
    public function addType(TransformerInterface $transformer): void
    {
        $this->transformerToBuild[get_class($transformer)] = $transformer;
    }

    public function __call($name, $arguments)
    {
        // If called method contains in name 'create' we will try to create something)))
        if (strpos($name, 'create') !== false && count($arguments) == 1) {
            // Create Transformers
            return $this->createTransformers(substr($name, strlen('create')), $arguments[0]);
        }
    }

    /**
     * Build a given number of transformers.
     * @param string $transformerType // Transformer type to build
     * @param integer $count // The number of robots which we want to build.
     * @return array // With cloned objects
     */
    private function createTransformers(string $transformerType, int $count): array
    {
        $transformerWhichWeWantToBuild = '';

        foreach ($this->getTransformersToBuildName() as $name) {
            if (strpos($name, $transformerType)) {
                $transformerWhichWeWantToBuild = $name;
            }
        }

        $buildedTransformers = [];

        for ($i = 0; $i < $count; $i++) {
            $buildedTransformers[] = clone $this->transformerToBuild[$transformerWhichWeWantToBuild];
        }

        return $buildedTransformers;
    }

    /**
     * Returns all transformers name which we have for build
     * @return array // with transformers name which we have for build
     */
    private function getTransformersToBuildName(): array
    {
        if (count($this->transformerToBuild) == 0) {
            throw new \Exception('No transformers to build');
        }

        return array_keys($this->transformerToBuild);
    }
}
