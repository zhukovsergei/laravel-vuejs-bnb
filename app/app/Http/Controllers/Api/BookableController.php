<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookableIndexResource;
use App\Http\Resources\BookableShowResource;
use Illuminate\Http\Request;

class BookableController extends Controller
{
    public function index()
    {
        $rows = \App\Models\Bookable::all();
        return BookableIndexResource::collection($rows);
    }

    public function show($id)
    {
        $row = \App\Models\Bookable::findOrFail($id);
        return new BookableShowResource($row);
    }
}
