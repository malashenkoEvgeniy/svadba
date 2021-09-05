<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ClothingSize;
use App\Models\Colors;
use App\Models\MainPage;
use App\Models\MediaProject;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\Silhouette;
use App\Models\Textile;
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
        $parent = Category::where('parent_id', 0)->get();
        $brands = Brand::all();
        $textiles = Textile::all();
        $silhouettes = Silhouette::all();
        return view('admin.products.create', compact('parent', 'brands', 'textiles',  'silhouettes'));
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
            'images' => 'nullable|mimes:jpeg,jpg,png,gif',
            'category_id'=>'required|not_in:0'

        ], [
            'images.mimes' => 'Поле "Картинка" должны обязательно иметь расширения: jpeg,jpg,png,gif',
            'category_id.not_in' => 'Поле "Родительская категория" должны быть заполнено',
            'category_id.required' => 'Поле "Родительская категория" должны быть заполнено',

        ]);

        $req = request()->only( 'category_id', 'price',   'new_price', 'brand_id', 'textile_id',  'silhouette_id' );
        $req['slug'] = SlugService :: createSlug ( Product :: class, 'slug' , $request->title );
        $req['is_promotion'] =  $request->has('is_promotion') ? 1 : 0;

        if($req['is_promotion'] !==0){
            $req['new_price'] = $request->price;
            $req['price'] = $request->new_price;
        } else {
            $req['new_price'] = 0;
        }
        $req['is_new'] =  $request->has('is_new') ? 1 : 0;
        $req[ 'is_collection'] =  $request->has( 'is_collection') ? 1 : 0;
        $req[ 'vendor_code'] =  $req['slug'];
        $reqT = request()->except('slug', 'category_id','size_id', 'price', 'brand_id', 'textile_id', 'colors_id', 'silhouette_id', 'is_promotion', 'is_new', 'is_collection', 'new_price', 'images' );


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
        $brands = Brand::all();
        $parent = Category::get();
        $textiles = Textile::all();
        $silhouettes = Silhouette::all();
        $product = Product::where('id', $id)
            ->with('options')
            ->first();
        $colors = Colors::all();


        return view('admin.products.edit', compact('product', 'parent','brands','textiles', 'silhouettes', 'colors'));
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
        $req = request()->only(  'price',   'new_price', 'brand_id', 'textile_id', 'silhouette_id'  );
        $req['is_promotion'] =  $request->has('is_promotion') ? 1 : 0;
        if($product->new_price == 0 ){
            if($req['is_promotion'] !==0){
                $req['new_price'] = $request->price;
                $req['price'] = $request->new_price;
            } else {
                $req['new_price'] = 0;
            }
        } else {
            if($req['is_promotion'] ==0){
                $req['new_price'] = 0;
            }
        }

        $req['is_new'] =  $request->has('is_new') ? 1 : 0;
        $req[ 'is_collection'] =  $request->has( 'is_collection') ? 1 : 0;
        $req[ 'available'] =  $request->has( 'main-available') ? 1 : 0;
        $product->update($req);
        $reqT = request()->only( 'title', 'language', 'body', 'seo_title', 'seo_description', 'seo_keywords');



        $this->updateTranslation($product, $reqT, $request);


        return redirect()->route('products.index')->with('success', 'Изменения сохранены');
    }

    public function requestProductOption(Request $request)
    {
        $size = ClothingSize::where([
            'size' =>$request->size,
        ])->first();
        if($size == null) {
            $size = ClothingSize::create(['size'=>$request->size]);
        }

        $option = ProductOption::where([
            'product_id' => $request->id,
            'colors_id' => $request->color_id,
            'size_id' =>$size->id
        ])->first();
        if($option == null) {
            ProductOption::create([
                'product_id' => $request->id,
                'colors_id' => $request->color_id,
                'size_id' =>$size->id,
                'available_quantity'=> $request->available_quantity,
            ]);
        } else {
            $option->available_quantity +=  $request->available_quantity;
            $option->update();
        }

        $product = Product::where('id', $request->id)
            ->with('options')
            ->first();

        if($request->ajax()){
            return view('ajax-tpl.edit_options', compact('product'))->render();
        }
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

        return redirect()->route('products.index')->with('success', 'Категория удалена');
    }

    public function getSubCategory(Request $request)
    {
        $subcategories = Category::where('parent_id',  $request->id)->get();
        if($request->ajax()){
            return view('ajax-tpl.get-sub-category', compact('subcategories'))->render();
        }
    }
}
