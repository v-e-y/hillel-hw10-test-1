<?php

declare(strict_types=1);

namespace Hillel\Transformers;

use Exception;
use Hillel\Transformers\Interfaces\TransformerInterface;

class TransformerFactory
{
    // Array with Transformers objects
    private array $transformerToBuild;

    // 
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
        
        throw new Exception('Call to undefined method');
    }

    private function createTransformers(string $transformerType, int $count): array
    {
        //
        var_dump($transformerType, $count);
    }

    private function getTransformersToBuildName(): array
    {
        if (empty($this->transformerToBuild)) {
            throw new Exception('No transformers to build');
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