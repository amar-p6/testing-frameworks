<?php

namespace unit;

use BOF\ExampleQueryService;
use \PHPUnit\Framework\TestCase;

class ExampleQueryServiceTest extends TestCase
{
    /**
     * @dataProvider queryProvider
     */
    public function testQuery($criteria, $repoResult, $expect)
    {
        $service = new ExampleQueryService($this->createMockRepo($criteria, $repoResult));

        $result = $service->query($criteria);

        $this->assertEquals($expect, $result);
    }

    public function queryProvider()
    {
        $caseA = 'CASE_A';
        $caseB = 'CASE_B';

        return [
            ['criteria' => ['test_1'], 'return' => [], 'expect' => []],
            ['criteria' => ['test_2'], 'return' => [1], 'expect' => [$caseA]],
            ['criteria' => ['test_3'], 'return' => [1, 2], 'expect' => [$caseA, $caseB]],
            ['criteria' => ['test_3'], 'return' => [1, 2], 'expect' => [$caseA, $caseB]],
            ['criteria' => ['test_3'], 'return' => [1, 2], 'expect' => [$caseA, $caseB]],
            ['criteria' => ['test_3'], 'return' => [1, 2], 'expect' => [$caseA, $caseB]],
            ['criteria' => ['test_3'], 'return' => [1, 2], 'expect' => [$caseA, $caseB]],
            ['criteria' => ['test_3'], 'return' => [1, 2], 'expect' => [$caseA, $caseB]],
        ];
    }

    private function createMockRepo($with, $repoResult)
    {
        $repo = $this->getMockBuilder('\Doctrine\ORM\EntityRepository')
            ->setMethods(['findBy'])
            ->disableOriginalConstructor()
            ->getMock();

        $repo->method('findBy')
            ->with($this->equalTo($with))
            ->willReturn($repoResult);

        return $repo;
    }
}