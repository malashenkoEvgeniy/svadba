<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaProject;
use App\Models\Silhouette;
use Illuminate\Http\Request;

class SilhouetteController extends BaseController
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
        $silhouettes = Silhouette::all();

        return view('admin.silhouettes.index', compact('silhouettes'));
    }

    public function create()
    {
        return view('admin.silhouettes.create');
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

        $req = [];
        if (request()->file('scheme') !== null) {
            $file = $this->storeFile(request()->file('scheme'), Silhouette::STORE_PATH);
            $req['scheme'] = $file['path'];
        }

        $reqT = request()->except('scheme', 'images' );

        $silhouette = $this->storeWithTranslation(new Silhouette(), $req,$reqT)['model'];


        if (request()->file('images') !== null) {
            $file = $this->storeFileForResize(request()->file('images'), Silhouette::STORE_PATH, Silhouette::PARAMETERS);
            $img = new MediaProject([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
            ]);
            $silhouette->attachments()->save($img);
        }


        return redirect()->route('silhouettes.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $silhouette = Silhouette::where('id', $id)->with('attachments')->first();

        return view('admin.silhouettes.edit', compact('silhouette'));
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
        $silhouette = Silhouette::where('id', $id)->with('attachments')->first();

        $reqTranslation = request()->except('images', 'scheme');
        if (request()->file('images') !== null) {
            if(count($silhouette->attachments)){
                foreach ($silhouette->attachments as $attachments){
                    $this->deleteFile($attachments->img_f);
                    $this->deleteFile($attachments->img_d);
                    $this->deleteFile($attachments->img_t);
                    $this->deleteFile($attachments->img_m);
                    $this->deleteFile($attachments->img_prev);
                }

                foreach ($silhouette->attachments as $atach){
                    $atach->delete();
                }
            }

            $file = $this->storeFileForResize(request()->file('images'), Silhouette::STORE_PATH, Silhouette::PARAMETERS);
            $img = new MediaProject([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
            ]);
            $silhouette->attachments()->save($img);
        }

        if (request()->file('scheme') !== null) {
            $this->deleteFile($silhouette->scheme);
            $file = $this->storeFile(request()->file('scheme'), Silhouette::STORE_PATH);
            $req['scheme'] = $file['path'];
            $silhouette->update($req);
        }

        $this->updateTranslation($silhouette, $reqTranslation, $request);


        return redirect()->route('silhouettes.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $silhouette = Silhouette::where('id', $id)->with('attachments')->first();
        if(count($silhouette->attachments)){
            foreach ($silhouette->attachments as $attachments){
                $this->deleteFile($attachments->img_f);
                $this->deleteFile($attachments->img_d);
                $this->deleteFile($attachments->img_t);
                $this->deleteFile($attachments->img_m);
                $this->deleteFile($attachments->img_prev);
            }

            foreach ($silhouette->attachments as $atach){
                $atach->delete();
            }
        }
        $this->deleteFile($silhouette->scheme);
        $silhouette->delete();

        return redirect()->route('silhouettes.index')->with('success', 'Категория удалена');
    }
}
