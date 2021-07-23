<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    protected $storePath = '/uploads/pages/';

    public function index()
    {
        $pages = Page::paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages_parent = Page::where('parent_id', null)->get();
        return view('admin.pages.create', compact('pages_parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'banner' => 'nullable|mimes:jpeg,jpg,png,gif',
            'icon' =>  'nullable|mimes:svg'
        ], [
            'image.mimes' => 'Поле "Картинка" должны обязательно иметь расширения: jpeg,jpg,png,gif',
            'banner.mimes' => 'Поле "Банер" должны обязательно иметь расширения: jpeg,jpg,png,gif',
            'icon.mimes' => 'Поле "Иконка для меню" должны обязательно иметь расширения: svg',
        ]);

        $req = request()->only('parent_id','url','image', 'icon' );
        $req['url'] = SlugService :: createSlug ( Category :: class, 'url' , $request->title );

        if (request()->file('image') !== null) {
            $file = $this->storeFile(request()->file('image'), $this->storePath);
            $req['image'] = $file['path'];
        }
        if (request()->file('banner') !== null) {
            $file = $this->storeFile(request()->file('banner'), $this->storePath);
            $req['banner'] = $file['path'];
        }


        if (request()->file('icon') !== null) {
            $file = $this->storeFile(request()->file('icon'), $this->storePath);
            $req['icon'] = $file['path'];
        }
        $reqT = request()->except('parent_id','url','image', 'banner', 'icon' );

        $this->storeWithTranslation(new Category(), $req, $reqT);

        return redirect()->route('categories.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->with('parent')->first();
        $categories_parent = Category::where('parent_id', null)->get();

        return view('admin.categories.edit',compact('category', 'categories_parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'banner' => 'nullable|mimes:jpeg,jpg,png,gif',
            'icon' =>  'nullable|mimes:svg'
        ], [
            'image.mimes' => 'Поле "Картинка" должны обязательно иметь расширения: jpeg,jpg,png,gif',
            'banner.mimes' => 'Поле "Банер" должны обязательно иметь расширения: jpeg,jpg,png,gif',
            'icon.mimes' => 'Поле "Иконка для меню" должны обязательно иметь расширения: svg',
        ]);
        $req = request()->only('parent_id');
        $reqTranslation = request()->except('image', 'icon','banner', 'parent_id');
        $category = Category::find($id);
        if (request()->file('image') !== null) {
            $this->deleteFile($category->image);
            $file = $this->storeFile(request()->file('image'), $this->storePath);
            $category->image = $file['path'];
            $category->update(['image' => $category->image]);
        }
        if (request()->file('banner') !== null) {
            $this->deleteFile($category->banner);
            $file = $this->storeFile(request()->file('banner'), $this->storePath);
            $category->banner = $file['path'];
            $category->update(['banner' => $category->banner]);
        }
        if (request()->file('icon') !== null) {
            $this->deleteFile($category->icon);
            $file = $this->storeFile(request()->file('icon'), $this->storePath);
            $category->icon = $file['path'];
            $category->update(['icon' => $category->icon]);
        }
        $category->update($req);

        $this->updateTranslation($category, $reqTranslation, $request);

        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::find($id);
        if($category->has('products')){

            $category->products()->detach();
        }
        if($category->image !== null){
            unlink(public_path($category->image));
        }
        if($category->icon !== null){
            unlink(public_path($category->icon));
        }



        $category->delete();


        return redirect()->route('categories.index')->with('success', 'Запись успешно удалена');
    }
}
