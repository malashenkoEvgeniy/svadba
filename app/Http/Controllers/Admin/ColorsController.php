<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use Illuminate\Http\Request;

class ColorsController extends BaseController
{
    protected $storePath = '/uploads/colors/';
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
        $colors = Colors::all();

        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = request()->only('meaning' );

        $reqT = request()->except( 'meaning' );

        $this->storeWithTranslation(new Colors(), $req,$reqT)['model'];

        return redirect()->route('colors.index')->with('success', 'Запись успешно создана');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Colors::where('id', $id)->first();
        return view('admin.colors.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $reqTranslation = request()->except('images');
        $brand = Brand::where('id', $id)->with('attachments')->first();
        if (request()->file('images') !== null) {
            if(count($brand->attachments)){
                foreach ($brand->attachments as $attachments){
                    $this->deleteFile($attachments->img_f);
                    $this->deleteFile($attachments->img_d);
                    $this->deleteFile($attachments->img_t);
                    $this->deleteFile($attachments->img_m);
                    $this->deleteFile($attachments->img_prev);
                }

                foreach ($brand->attachments as $atach){
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
            $brand->attachments()->save($img);
        }
        $this->updateTranslation($brand, $reqTranslation, $request);


        return redirect()->route('brands.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $brand = Brand::where('id', $id)->with('attachments')->first();
        if(count($brand->attachments)){
            foreach ($brand->attachments as $attachments){
                $this->deleteFile($attachments->img_f);
                $this->deleteFile($attachments->img_d);
                $this->deleteFile($attachments->img_t);
                $this->deleteFile($attachments->img_m);
                $this->deleteFile($attachments->img_prev);
            }

            foreach ($brand->attachments as $atach){
                $atach->delete();
            }
        }
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Бренд удален');
    }
}
