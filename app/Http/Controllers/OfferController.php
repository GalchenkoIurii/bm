<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function create($id)
    {
        return view('offer.offer-create', compact('id'));
    }

    public function store(Request $request, $application)
    {
        $request_data = array_diff(
            $request->validate([
                'comment' => 'nullable|max:191'
            ]),
            [null]
        );

        $request_data['application_id'] = $application;
        $request_data['user_id'] = Auth::id();

        $offer = Offer::create($request_data);

        return redirect()->route('applications.show', ['application' => $application])
            ->with('success', 'Ваше предложение сохранено');
    }
}
