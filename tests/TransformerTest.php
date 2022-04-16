<?php

namespace Hillel\Transformers\Tests;

use ReflectionClass;
use Hillel\Transformers\MergeTransformer;
use Hillel\Transformers\Transformer1;
use Hillel\Transformers\Transformer2;
use Hillel\Transformers\TransformerFactory;
use PHPUnit\Framework\TestCase;

class TransformerTest extends TestCase
{
    protected TransformerFactory $transFactory;
    protected MergeTransformer $mergeTransformer;

    public function setUp(): void
    {
        $this->transFactory = new TransformerFactory();
        $this->mergeTransformer = new MergeTransformer();
    }

    public function testBuildTransformers()
    {
        $this->transFactory->addType(new Transformer1);

        $this->assertEquals(
            [new Transformer1, new Transformer1],
            $this->transFactory->createTransformer1(2)
        );
        
        $this->transFactory->addType(new Transformer2);

        $this->assertEquals(
            [new Transformer2, new Transformer2, new Transformer2, new Transformer2],
            $this->transFactory->createTransformer2(4)
        );
    }

    public function testMergeTransformers()
    {
        $this->mergeTransformer->addTransformer(new Transformer1);
        $emptyTransformer = new MergeTransformer();

        $this->assertNotEquals(
            $this->mergeTransformer,
            $emptyTransformer,
        );

        $this->assertEquals(
            [
                'speed' => 10,
                'speedSign' => 'km/h',
                'weight' => 2824,
                'weightSign' => 'kg',
                'height' => 8.5,
                'heightSign' => 'm'
            ],
            $this->mergeTransformer->getTransformerCharacteristics()
        );

        $this->transFactory->addType(new Transformer2);
        $this->mergeTransformer->addTransformer($this->transFactory->createTransformer2(2));
        
        $this->assertEquals(
            [
                'speed' => 10.0,
                'speedSign' => 'km/h',
                'weight' => 5224.0,
                'weightSign' => 'kg',
                'height' => 14.5,
                'heightSign' => 'm'
            ],
            $this->mergeTransformer->getTransformerCharacteristics()
        );
    }
}
