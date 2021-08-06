<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MediaProject;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $storePath = '/uploads/category/';
    protected $parameters = [
        'img_d_w' => 800,
        'img_d_h' => 800,
        'img_t_w' => 500,
        'img_t_h' => 500,
        'img_m_w' => 300,
        'img_m_h' => 300,
        'img_p_w' => 100,
        'img_p_h' => 100,
    ];

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
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parent = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.create', compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $req = request()->only('slug', 'parent_id' );
        $req['slug'] = SlugService :: createSlug ( Category :: class, 'slug' , $request->title );

        $reqT = request()->except('slug', 'parent_id', 'images' );

         $category = $this->storeWithTranslation(new Category(), $req,$reqT)['model'];


        if (request()->file('images') !== null) {
            $file = $this->storeFileForResize(request()->file('images'), $this->storePath, $this->parameters);
            $img = new MediaProject([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
            ]);
            $category->attachments()->save($img);
        }


        return redirect()->route('categories.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
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
        $request->validate([
            'title' => 'required',
        ]);

        $reqTranslation = request()->except('images');
        $category = Category::find($id);
        if (request()->file('images') !== null) {
            $this->deleteFile($category->image);
            $file = $this->storeFile(request()->file('images'), $this->storePath);
            $category->images = $file['path'];
            $category->update(['images' => $category->images]);
        }
         $this->updateTranslation($category, $reqTranslation, $request);


        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
