<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends BaseController
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

        $shops= Shop::all();


        return view('admin.shops.index', compact('shops'));
    }

    public function create()
    {
        $cities = City::get();
        return view('admin.shops.create', compact('cities'));
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
//        dd($request);
        $req = request()->only( 'email', 'phone',   'working_house', 'city_id' );

        $reqT = request()->except('email', 'phone',   'working_house', 'city_id');

        $this->storeWithTranslation(new Shop(), $req,$reqT);
        return redirect()->route('shops.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $cities = City::get();
        $shop = Shop::where('id', $id)->first();
        return view('admin.shops.edit', compact('cities', 'shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {



        $shop= Shop::where('id', $id)->with('city')->first();

        $req = request()->only( 'email', 'phone',   'working_house', 'city_id' );

        $reqT = request()->except('email', 'phone',   'working_house', 'city_id');
        $shop->update($req);

        $this->updateTranslation($shop, $reqT, $request);


        return redirect()->route('shops.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $shop= Shop::where('id', $id)->first();
        $shop->delete();

        return redirect()->route('shops.index')->with('success', 'Категория удалена');
    }
}

