<?php

namespace BOF;

use \Doctrine\ORM\EntityRepository;

class ExampleQueryService
{
    /** @var EntityRepository $repository */
    protected $repository;

    /**
     * @param EntityRepository $repository
     */
    public function __construct(
        EntityRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function query(array $criteria = [])
    {
        $result = $this->repository->findBy($criteria);

        return array_map([$this, 'map'], $result);
    }

    private function map($item)
    {
        if ($item === 1) {
            return 'CASE_A';
        }

        return 'CASE_B';
    }
}