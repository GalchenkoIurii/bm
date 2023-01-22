<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationStoreRequest;
use App\Models\Application;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Auth::user()->services()->pluck('service_id')->toArray();

        $applications = Application::with(['category', 'service', 'user'])->whereIn('service_id', $services)->paginate(9);

        return view('applications.applications', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('applications.applications-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationStoreRequest $request)
    {
        $request_data = $request->validated();

        if ($request->hasFile('photo')) {
            $folder = date('Y-m-d');
            $request_data['photo'] = $request->file('photo')->store('applications/' . $folder, 'public');
        }

        $request_data['user_id'] = Auth::id();

        $application = Application::create($request_data);

        return redirect()->route('application.created');
    }

    /**
     * Display the specified resource.
     *
     * @param  Application $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        return view('applications.applications-show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function applicationCreated()
    {
        return view('applications.application-created');
    }

    public function getServices(Request $request)
    {
        $services = Service::where('category_id', $request->input('category_id'))->get();

        return response()->json($services->toArray());
    }

    public function notMaster()
    {
        return view('applications.application-not-master');
    }
}
