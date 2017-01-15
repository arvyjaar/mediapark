<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Advert;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateAdvertisementsRequest;
use App\Http\Requests\StoreAdvertisementsRequest;

class PrivateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::where('user_id', Auth::user()->id)->paginate(5);
        $description = 'Your advertisements';
        return view('home', compact('adverts', 'description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisementsRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        $ad = Advert::create($request->all());

        return redirect()->route('private.index');
    }

    public function edit($id)
    {
        $advert = Advert::findOrFail($id);

        if (! Gate::allows('private.edit', $advert)) {
            return abort(401);
        }

        return view('edit', compact('advert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisementsRequest $request, $id)
    {
        $advert = Advert::findOrFail($id);

        if (! Gate::allows('private.update', $advert)) {
            return abort(401);
        }
        $advert->update($request->all());

        return redirect()->route('private.index');
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
}
