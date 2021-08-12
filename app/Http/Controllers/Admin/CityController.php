<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Colors;
use Illuminate\Http\Request;

class CityController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities= City::all();
        return view('admin.cities.index', compact('cities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'title' => 'required|max:255',
//        ]);

        $req = request()->only( 'title' );

        $this->storeWithTranslation(new City(), [], $req);

        return redirect()->route('cities.index')->with('success', 'Запись успешно создана');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = City::where('id', $id)->first();
        $category->delete();

        return redirect()->route('cities.index')->with('success', 'Город удален');
    }
}
