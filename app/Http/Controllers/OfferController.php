<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create($id)
    {
        return view('offer.offer-create', compact('id'));
    }
}
