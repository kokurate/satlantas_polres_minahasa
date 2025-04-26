<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Information;
use App\Models\Kritik_saran;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index',[
            'feedback' => Feedback::WhereNotNull('konten')->orderBy('updated_at','ASC')->get(),
            'information' => Information::orderBy('updated_at', 'ASC')->get(),
        ]);
    }

    public function feedback_detail(Feedback $feedback){
        return view('admin.feedback.detail',[
            'feedback' => $feedback,
        ]);
    }

    public function informasi_create(){
        return view('admin.informasi.create',[

        ]);
    }

    public function informasi_store(Request $request){
   
        $validator = Validator::make($request->all(),[
            'judul' => 'required',
            'konten' => 'required',
            'gbr_pendukung' => 'required|image|file|max:1024',
           
        ],
        [
            'judul.required' => 'Judul harus diisi',
            'konten.required' => 'Konten tidak boleh kosong',
            'gbr_pendukung.required' => 'Gambar tidak boleh kosong',
            'gbr_pendukung.image' => 'Gambar harus format gambar',
            'gbr_pendukung.max' => 'Gambar tidak boleh lebih dari 1MB',
         
        ]);
        // Kalo error kase alert error
            if($validator->fails()){
                return back()->with('toast_error', $validator->errors()->all()[0])->withInput()->withErrors($validator);
                // return back()->with('errors', $validator->errors()->all()[0])->withInput()->withErrors($validator);
                
            }
        // Validasi
            $validatedData = $validator->validated();


            // $validatedData['slug'] = Str::slug($validatedData['judul']). + 1;
            $validatedData['gbr_pendukung'] = $request->file('gbr_pendukung')->store('image');
            $validatedData['slug'] = $request->slug;
            $validatedData['id_user'] = $request->id_user;
            // dd($validatedData);
            Information::create($validatedData);

            return redirect()->route('admin.index')->withSuccess('Informasi berhasil ditambahkan');
    }

    public function checkSlugInformation (Request $request){
        $slug = SlugService::createSlug(Information::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    public function informasi_update(Information $information){
        return view('admin.informasi.update',[
            'information' => $information,

        ]);
    }

    public function informasi_update_store(Request $request, Information $information){
      
        $rules = [
            'judul' => 'required',
            'konten' => 'required',
            'gbr_pendukung' => 'image|file|max:1024',
            // 'gbr_pendukung' => 'required|image|file|max:1024',
        ];
        // if($request->slug != $information->slug){
        //     // give the value
        // }

        

        $validatedData = $request->validate($rules);
        
        if($request->file('gbr_pendukung') ){
            // $rules = [ 'gbr_pendukung' => 'required|image|file|max:1024'];
           
            if($request->oldImage ){
                Storage::delete($request->oldImage);
            }
            $validatedData['gbr_pendukung'] = $request->file('gbr_pendukung')->store('image');
        }
        // dd($validatedData);

        // if($request->file('gbr_pendukung') == null){

        // }

       

        Information::where('id', $information->id)
                    ->update($validatedData);
        
        return redirect()->route('admin.index')->withSuccess('Informasi berhasil diupdate');

    }

    public function informasi_destroy(Information $information){
        Information::destroy($information->id);
        if($information->gbr_pendukung ){
            Storage::delete($information->gbr_pendukung);
        }

        return redirect()->route('admin.index')->withSuccess('Berhasil hapus data');
    }
}
