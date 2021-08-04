<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainPage;
use Illuminate\Http\Request;

class MainPageController extends BaseController
{
    protected $storePath = '/uploads/pages/';
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
        $page = MainPage::first();
        if ($page === null) {
            $page = MainPage::create(['image' => 'null']);
            $page->translations()->create(['language' => 'ru', 'seo_title' => 'Главная']);
        }
        return view('admin.main_page.edit', compact('page'));
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
        $page = MainPage::find($id);
        $req = request()->only('image');
        $reqTranslation = request()->except('image');

        if (request()->file('image') !== null) {
            $this->deleteFile($page->image);
            $file = $this->storeFile(request()->file('image'), $this->storePath);
            $req['image'] = $file['path'];
        }

        $page->update($req);

        $page = $this->updateTranslation($page, $reqTranslation, $request);

        return redirect()->back()->with('success', 'Запись успешно обновлена');
    }
}
