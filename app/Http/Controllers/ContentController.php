<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller {

    public function index() {
        $newc = DB::select('select * from news inner join news_cat on news.cat = news_cat.id');
        return view('content.index', array('newc' => $newc));
        /*
          $newc = DB::table('news')
          ->join('news_cat', 'news.cat', '=' , 'news_cat.id')
          ->get();
          return view('content.index', array ( 'newc' => $newc )); */
    }

    public function edit($nid) {
        $news = DB::select('select * from news inner join news_cat on news.cat = news_cat.id
      where nid = :nid', ['nid' => $nid]);
        return view('content.editcontent', ['news' => $news, 'nid' => $nid]);
    }
    public function update(Request $request) {
      if ($request->hasFile('file')) {
          $filename = $request->file->getClientOriginalName();
          /* storeAs = แอดลงโฟล์เดอร์ */
          $filename = $request->file->storeAs('upload', $filename); }
      if ($request->hasFile('img')) {
        $imgname = $request->img->getClientOriginalName();
        /* storeAs = แอดลงโฟล์เดอร์ */
        $imgname = $request->img->storeAs('uploadimg', $imgname); }
      if (!$request->hasFile('img')) {
          $imgname = $request->input('img'); }
      if (!$request->hasFile('file')) {
        $filename = $request->input('file'); }


        if ($request->hasFile('file')) {
          $filename = $request->file->getClientOriginalName();
          $filename = $request->file->storeAs('upload', $filename); }
      if ($request->hasFile('img')) {
        $imgname = $request->img->getClientOriginalName();
        $imgname = $request->img->storeAs('uploadimg', $imgname); }
    if (!$request->hasFile('img')) {
          $imgname = $request->input('img'); }
      if (!$request->hasFile('file')) {
        $filename = $request->input('file'); }

        DB::table('news')
                ->where('nid', $request->input('nid'))
                ->update(['cat' => $request->input('group'),
                    'orders' => $order = $request->input('order'),
                    'title_th' => $request->input('title_th'),
                    'title_en' => $request->input('title_en'),
                    'type' => $request->input('type'),
                    'file' => $filename,
                    'img' => $imgname,
                    'url' => $request->input('url'),
                    'record_status' => "N",
                    'text_th' => $request->input('text_th'),
                    'text_en' => $request->input('text_en'),
                    'last_user_new' => $request->input('create_user'),
                    'last_date_new' =>  $request->input('create_date')
        ]);
        return redirect('content');
    }

    public function destroy($nid) {
        DB::table('news')->where('nid', $nid)->delete();
        return back();
    }
/*
    public function uploadForm() {
        return view('home');
    }

    public function uploadSubmit(Request $request) {
        if ($request->hasFile('file')) {
            $filename = $request->file->getClientOriginalExtension();
             storeAs = แอดลงโฟล์เดอร์
            $request->file->storeAs('uplode', 'doc' . date("d_m_Y_h_i_s") . "." . $filename);
            return 'yes';
              $product = Product::create($request->all());
              foreach ($request->photos as $photo) {
              App = ชื่อโฟล์เดอร์
              $request->$photo->getClientOriginalName();
              $filename = $photo->store('App');
              ProductsPhoto::create([
              'product_id' => $product->id,
              'filename' => $filename
              ]);
        }

        return $request->all();
    }
*/
}
