<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create($id)
    {
        return view('offer.offer-create', compact('id'));
    }

    public function store(Request $request, $application)
    {
        $data = $request->validate([
            'comment' => 'nullable|max:191'
        ]);

    }
}
