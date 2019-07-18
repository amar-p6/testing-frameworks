<?php

namespace spec\BOF;

use PhpSpec\ObjectBehavior;

class ExampleQueryServiceSpec extends ObjectBehavior
{
    function it_returns_expected_results_on_empty_results()
    {
        $repo = $this->getMockEntityRepository([]);
        $this->beConstructedWith($repo);
        $this->query([])->shouldReturn([]);
    }

    function it_returns_expected_results_on_one_result()
    {
        $repo = $this->getMockEntityRepository([1]);
        $this->beConstructedWith($repo);
        $this->query([])->shouldReturn(['CASE_A']);
    }

    function it_returns_expected_results_on_more_than_one_result()
    {
        $repo = $this->getMockEntityRepository([1, 2, 3]);
        $this->beConstructedWith($repo);
        $this->query([])->shouldReturn(['CASE_A', 'CASE_B', 'CASE_B']);
    }

    function it_returns_expected_results_on_more_than_one_result()
    {
        $repo = $this->getMockEntityRepository([1, 2, 3]);
        $this->beConstructedWith($repo);
        $this->query([])->shouldReturn(['CASE_A', 'CASE_B', 'CASE_B']);
    }

    function it_returns_expected_results_on_more_than_one_result()
    {
        $repo = $this->getMockEntityRepository([1, 2, 3]);
        $this->beConstructedWith($repo);
        $this->query([])->shouldReturn(['CASE_A', 'CASE_B', 'CASE_B']);
    }

    function it_returns_expected_results_on_more_than_one_result()
    {
        $repo = $this->getMockEntityRepository([1, 2, 3]);
        $this->beConstructedWith($repo);
        $this->query([])->shouldReturn(['CASE_A', 'CASE_B', 'CASE_B']);
    }

    private function getMockEntityRepository($return)
    {
        $prophet = new \Prophecy\Prophet();
        $repo = $prophet->prophesize('\Doctrine\ORM\EntityRepository');
        $repo->findBy([])->willReturn($return);

        return $repo;
    }
}
