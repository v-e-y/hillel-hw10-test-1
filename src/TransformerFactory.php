<?php

declare(strict_types=1);

namespace Hillel\Transformers;

use Hillel\Transformers\Interfaces\TransformerInterface;

class TransformerFactory
{
    // Array with Transformers objects
    private array $transformerToBuild;

    public function addType(TransformerInterface $transformer): void
    {
        $this->transformerToBuild[get_class($transformer)] = $transformer;
    }

    public function __call($name, $arguments)
    {
        if (strpos($name, 'create') !== false && count($arguments) == 1) {
            // Create Transformers
            $this->createTransformers(substr($name, strlen('create')), $arguments[0]);
        }
        
        //throw new Exception('Call to undefined method');
    }

    private function createTransformers(string $transformerType, int $count)
    {
        $transformerForBuild = '';

        foreach ($this->getTransformersToBuildName() as $name) {
            if (strpos($name, $transformerType)) {
                $transformerForBuild = $name;
            }
        }

        $buildedTransformers = [];
        var_dump($this->transformerToBuild[$transformerForBuild]);

        var_dump($this->transformerToBuild[$transformerForBuild]->getSpeed());

        for ($i = 0; $i< $count; $i++) {
            $buildedTransformers[] = clone $this->transformerToBuild[$transformerForBuild];
        }

        return $buildedTransformers;
    }

    private function getTransformersToBuildName(): array
    {
        if (count($this->transformerToBuild) == 0) {
            throw new \Exception('No transformers to build');
        }

        return array_keys($this->transformerToBuild);
    }



    /*
    private function buildRobots(RobotInterface $robot, int $howMuch): array
    {
        $robots = [];
        for ($i=0; $i < $howMuch; $i++) { 
            $robots
        }
        return [];
    }
    */
}