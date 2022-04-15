<?php

declare(strict_types=1);

namespace Hillel\Robots;

use Hillel\Robots\Interfaces\RobotInterface;

class TransformerFactory
{
    public function addType(RobotInterface $robot): RobotInterface
    {
        return $robot;
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