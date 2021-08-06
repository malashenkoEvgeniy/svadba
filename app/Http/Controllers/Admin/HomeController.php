<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainPage;
use App\Models\MainSlider;
use App\Models\MediaProject;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    protected $storePath = '/uploads/main-pages/';


    public function index()
    {
        $page = MainPage::first();
        $slider = MainSlider::all();
        return view('admin.home.index', compact('page', 'slider'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $page = MainPage::first();
        return view('admin.home.edit', compact('page'));
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


        $reqTranslation = request()->except('images');
        $page = MainPage::first();
        $parameters = [
            'img_d_w' => 800,
            'img_d_h' => 800,
            'img_t_w' => 500,
            'img_t_h' => 500,
            'img_m_w' => 300,
            'img_m_h' => 300,
            'img_p_w' => 100,
            'img_p_h' => 100,
        ];
        if (request()->file('images') !== null) {
            $file = $this->storeFileForResize(request()->file('images'), $this->storePath,  $parameters);
            $img = new MediaProject([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
                ]);
            $slider = new MainSlider();
            $slider->save();
            $slider->attachments()->save($img);
        }


         $this->updateTranslation($page, $reqTranslation);


        return redirect()->route('my-home', 1)->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $slide = MainSlider::where(['id'=>$id])->with('attachments')->first();

        foreach ($slide->attachments as $attachments){
            $this->deleteFile($attachments->img_f);
            $this->deleteFile($attachments->img_d);
            $this->deleteFile($attachments->img_t);
            $this->deleteFile($attachments->img_m);
            $this->deleteFile($attachments->img_prev);
        }

        foreach ($slide->attachments as $atach){
            $atach->delete();
        }
        $slide->delete();
        return redirect()->route('my-home')->with('success', 'Изображение удалено');
    }

}
