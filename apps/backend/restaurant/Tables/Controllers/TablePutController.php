<?php

declare(strict_types=1);

namespace Apps\Backend\restaurant\Tables\Controllers;

use App\Http\Controllers\Controller;
use AppRestaurant\Restaurant\Tables\Application\Update\TableUpdate;
use AppRestaurant\Restaurant\Tables\Application\Update\TableUpdateRequest;
use Illuminate\Http\Request;

final class TablePutController extends Controller
{
    const MESSAJE_UPDATE = "Table update successfully";
    private $update;

    public function __construct(
        TableUpdate $update
    )
    {
        $this->update = $update;
    }

    public function __invoke(Request $request)
    {
        try {
            ($this->update)(new TableUpdateRequest(
                (string)$request->id,
                (int)$request->number,
                (int)$request->maxPeople,
                (int)$request->minPeople,
                (string)$request->description
            ));
        } catch (\Exception $exception) {

        }
    }

}
