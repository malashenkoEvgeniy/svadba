<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Shop;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    protected $storePath = '/uploads/page/';

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
//        $page = Page::where('id', 2)->first();
//        dd(count($page->children));

        return view('admin.pages.index');
    }

    public function create()
    {
        $parent = Page::where('parent_id', 0)->get();
        return view('admin.pages.create', compact('parent'));
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
        $req['parent_id'] = 2;
        $req['slug'] = SlugService :: createSlug ( Page :: class, 'slug' , $request->title );
        $reqT = request()->except('slug', 'parent_id');

        $this->storeWithTranslation(new Page(), $req,$reqT);

        return redirect()->route('pages.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $pageEdit = Page::where('id', $id)->first();
        if ($id==6){
            return view('admin.pages.contact', compact('pageEdit'));
        }
        return view('admin.pages.edit', compact('pageEdit'));
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
//        $request->validate([
//            'title' => 'required',
//        ]);
       $page = Page::where('id', $id)->first();
        if ($id == 6){
            $contacts = Contact::where('id', 1)->first();
            $reqT = request()->except('logo', 'email', 'email_for_forms', 'phone_1', 'phone_2', 'phone_social', 'viber', 'telegram', 'fb', 'instagram' ,'working_house',
                 'icon','banner', 'parent_id');

            $recC =  request()->only('email', 'email_for_forms', 'phone_1', 'phone_2', 'phone_social', 'viber', 'telegram', 'fb', 'instagram' ,'working_house',
                'icon','banner', 'parent_id');
            if (request()->file('logo') !== null) {
                $this->deleteFile($contacts->logo);
                $file = $this->storeFile(request()->file('logo'), $this->storePath);
                $recC['logo']  = $file['path'];

            }
//            dd($recC);
            $this->updateTranslation($page, $reqT, $request);
            $contacts->update($recC);
            return redirect()->route('pages.edit', ['page'=>6])->with('success', 'Изменения сохранены');
        }
        $reqT = request()->all();
        $this->updateTranslation($page, $reqT, $request);

        return redirect()->route('pages.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $page = Page::where('id', $id)->first();
        $page->delete();

        return redirect()->route('products.index')->with('success', 'Категория удалена');
    }
}
