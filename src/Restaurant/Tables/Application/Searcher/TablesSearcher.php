<?php

declare(strict_types=1);

namespace AppRestaurant\Restaurant\Tables\Application\Searcher;

use AppRestaurant\Restaurant\Tables\Domain\Contract\TableRepository;

final class TablesSearcher
{
    private $repository;

    public function __construct(
        TableRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(TablesSearcherRequest $request)
    {
        $result = $this->repository->searcherList($request->filters());
        
    }

}
