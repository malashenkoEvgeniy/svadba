<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MediaProject;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    protected $storePath = '/uploads/product/';
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
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $parent = Category::get();
        return view('admin.products.create', compact('parent'));
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
        $req = request()->only( 'category_id', 'price',   'new_price' );
        $req['slug'] = SlugService :: createSlug ( Product :: class, 'slug' , $request->title );
        $req['is_promotion'] =  $request->has('is_promotion') ? 1 : 0;
        $req['is_new'] =  $request->has('is_new') ? 1 : 0;
        $req[ 'is_collection'] =  $request->has( 'is_collection') ? 1 : 0;
        $req[ 'vendor_code'] =  $req['slug'];
        $reqT = request()->except('slug', 'category_id', 'price', 'is_promotion', 'is_new', 'is_collection', 'new_price', 'images' );

        $product = $this->storeWithTranslation(new Product(), $req,$reqT)['model'];


        if (request()->file('images') !== null) {
            $file = $this->storeFileForResize(request()->file('images'), $this->storePath, $this->parameters);
            $img = new MediaProject([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
            ]);
            $product->attachments()->save($img);
        }


        return redirect()->route('products.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $parent = Category::get();
        $product = Product::where('id', $id)->first();
        return view('admin.products.edit', compact('product', 'parent'));
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


        $product = Product::where('id', $id)->with('attachments')->first();
        if (request()->file('images') !== null) {
            if(count($product->attachments)){
                foreach ($product->attachments as $attachments){
                    $this->deleteFile($attachments->img_f);
                    $this->deleteFile($attachments->img_d);
                    $this->deleteFile($attachments->img_t);
                    $this->deleteFile($attachments->img_m);
                    $this->deleteFile($attachments->img_prev);
                }

                foreach ($product->attachments as $atach){
                    $atach->delete();
                }
            }

            $file = $this->storeFileForResize(request()->file('images'), $this->storePath, $this->parameters);
            $img = new MediaProject([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
            ]);
            $product->attachments()->save($img);
        }
        $req = request()->only( 'category_id', 'price',   'new_price' );
        $req['is_promotion'] =  $request->has('is_promotion') ? 1 : 0;
        $req['is_new'] =  $request->has('is_new') ? 1 : 0;
        $req[ 'is_collection'] =  $request->has( 'is_collection') ? 1 : 0;
        $product->update($req);
        $reqT = request()->except( 'category_id', 'price', 'is_promotion', 'is_new', 'is_collection', 'new_price', 'images' );



        $this->updateTranslation($product, $reqT, $request);


        return redirect()->route('products.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->with('attachments')->first();
        if(count($category->attachments)){
            foreach ($category->attachments as $attachments){
                $this->deleteFile($attachments->img_f);
                $this->deleteFile($attachments->img_d);
                $this->deleteFile($attachments->img_t);
                $this->deleteFile($attachments->img_m);
                $this->deleteFile($attachments->img_prev);
            }

            foreach ($category->attachments as $atach){
                $atach->delete();
            }
        }
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
