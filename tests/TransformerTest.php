<?php

namespace Hillel\Transformers\Tests;

use ReflectionClass;
use Hillel\Transformers\MergeTransformer;
use Hillel\Transformers\Transformer1;
use Hillel\Transformers\TransformerFactory;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    protected TransformerFactory $transFactory;

    public function setUp(): void
    {
        $this->transFactory = new TransformerFactory();
    }

    

    public function testPrice()
    {
        $this->transFactory->addType(new Transformer1);

        //$this->assertEqualsCanonicalizing(17500, $this->product->price);

        $this->assertEquals(
            [Transformer1::class],
            (new ReflectionClass(Transformer1::class))
                ->getProperty('transformerToBuild')
                ->getValue($this->transformerToBuild)
        );
        /*
        $this->product->price = 18500;

        $this->assertEqualsCanonicalizing(18500, $this->product->price);

        $this->assertEquals(
            1850000,
            (new ReflectionClass(Product::class))
                ->getProperty('price')
                ->getValue($this->product)
        );
        */
    }

    /*
    public function testAttributes()
    {
        $this->assertEqualsCanonicalizing(
            ['memory' => '8GB', 'color' => 'silver'],
            $this->product->attributes
        );

        $this->assertEquals(
            '{"memory":"8GB","color":"silver"}',
            (new ReflectionClass(Product::class))
                ->getProperty('attributes')
                ->getValue($this->product)
        );

        $attributes = $this->product->attributes;
        $attributes['year'] = 2021;
        $this->product->attributes = $attributes;

        $this->assertEqualsCanonicalizing(
            ['memory' => '8GB', 'color' => 'silver', 'year' => 2021],
            $this->product->attributes
        );

        $this->assertEquals(
          '{"memory":"8GB","color":"silver","year":2021}',
          (new ReflectionClass(Product::class))
              ->getProperty('attributes')
              ->getValue($this->product)
        );
    }

    public function testUpdatedAt()
    {
        $this->assertEqualsCanonicalizing(
            '2022-04-08 17:31:09',
            $this->product->updatedAt
        );

        $this->assertEquals(
            1649428269,
            (new ReflectionClass(Product::class))
                ->getProperty('updatedAt')
                ->getValue($this->product)
        );

        $this->product->updatedAt = 1649433098;

        $this->assertEqualsCanonicalizing(
            '2022-04-08 18:51:38',
            $this->product->updatedAt
        );

        $this->assertEquals(
            1649433098,
            (new ReflectionClass(Product::class))
                ->getProperty('updatedAt')
                ->getValue($this->product)
        );
    }
    */
}
