<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ReadingTimeTest extends KernelTestCase
{
    /*public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);
    }*/

    public function testCalculate(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $readingTimeService = $container->get(\App\Service\ReadingTime::class);

        $this->assertEquals('1 min', $readingTimeService->calculate(str_repeat('word ', 250)));
        $this->assertEquals('2 min', $readingTimeService->calculate(str_repeat('word ', 500)));
        $this->assertEquals('3 min', $readingTimeService->calculate(str_repeat('word ', 650)));
    }
}
