<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Textile;
use Illuminate\Http\Request;

class TextileController extends BaseController
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

        $textiles = Textile::all();
        return view('admin.textiles.index', compact('textiles'));
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
        $req['language'] = 'ru';

        $this->storeWithTranslation(new Textile(), [], $req);

        return redirect()->route('textiles.index')->with('success', 'Запись успешно создана');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Textile::where('id', $id)->first();
        $category->delete();

        return redirect()->route('textiles.index')->with('success', 'Город удален');
    }
}
