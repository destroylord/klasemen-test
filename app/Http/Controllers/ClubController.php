<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index() {
        
        return view('clubs.index', [
            'clubs' => Club::all()
        ]);
    }

    public function store(ClubRequest $request) {

        Club::create($request->all());

        return back();
    }
}
