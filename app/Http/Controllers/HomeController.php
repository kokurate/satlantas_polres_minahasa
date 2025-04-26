<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\RegisterFeedback;
use App\Models\Information;
use App\Models\KritikSaran;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class HomeController extends Controller
{
    public function index(){
        return view('home',[

        ]);
    }

    public function informasi(){
        return view('informasi',[
            'information' => Information::all(),
        ]);
    }

    public function informasi_detail(Information $information){

        return view ('informasi_detail',[
            'info' => $information,
        ]);

    }

    public function feedback(){
        return view('feedback',[
            'feedback' => Feedback::WhereNotNull('konten')->orderBy('updated_at','ASC')->get(),
        ]);
    }

    public function register_feedback(){
        return view('register_feedback',[

        ]);
    }

    public function register_feedback_store(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $validated['token'] = Str::random(64);

        Feedback::create($validated);

        $data = [
            'title' =>'Terima Kasih Sudah Registrasi ',
            'content' => 'Untuk menambahkan umpan balik silahkan klik button di bawah ini',
            'url' => 'http://127.0.0.1:8000/feedback/create/' . $validated['token'],
        ];

        Mail::to($validated['email'])->send(new RegisterFeedback ($data));
        Alert::success('Registrasi Email Berhasil', 'Silahkan cek email anda untuk menambahkan feedback');

        return redirect()->route('home.feedback');
    }

    public function create_feedback(Request $request, Feedback $feedback){
        return view('create_feedback',[
            'url_token' => $request->url(),
            'feedback' => $feedback,
        ]);
    }

    public function create_feedback_store(Request $request, Feedback $feedback){
        $validator = Validator::make($request->all(),[
            'konten' => 'required',
            'gbr_pendukung' => 'required|image|file|max:1024',
           
        ],
        [
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

             // Kalo image ada isi, store(), kalo nda kasih nilai null
            // if($request->file('visitor_image_2')){
            //     $validatedData['visitor_image_2'] = $request->file('visitor_image_2')
            //                                                 ->store('image');
            // }

    // $validatedData['token'] = null;
    $validatedData['gbr_pendukung'] = $request->file('gbr_pendukung')->store('image');
    // Create Feedback
    Feedback::where('id',$feedback->id)->update($validatedData);
            
       

       return redirect()->route('home.feedback')->withSuccess('Feedback berhasil ditambahkan');
                      
    }

    public function feedback_detail(Feedback $feedback){
        return view('feedback_detail',[
            'feedback' => $feedback,
        ]);
    }


    public function checkSlugKritikSaran (Request $request){
        $slug = SlugService::createSlug(KritikSaran::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    public function kritik_saran(){
        return view('kritik_saran',[
        
        ]);
    }

    public function kritik_saran_store(Request $request)
{
        // Manual Validator dengan custom error message
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/u|max:255', // Nama hanya huruf dan spasi
            'alamat' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'slug' => 'required|unique:kritik_sarans,slug',
            'konten' => 'required|string',
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'nama.required' => 'Nama harus diisi.',
            'nama.regex' => 'Nama hanya boleh mengandung huruf dan spasi.',
            'alamat.required' => 'Alamat harus diisi.',
            'judul.required' => 'Judul harus diisi.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan, buat judul lain.',
            'konten.required' => 'Kritik & Saran harus diisi.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()
                ->with('toast_error', $validator->errors()->first())
                ->withInput()
                ->withErrors($validator);
        }

        // Jika lolos validasi
        $validatedData = $validator->validated();

        // Simpan ke database
        KritikSaran::create($validatedData);

        // Redirect setelah sukses
        return redirect()->route('home.kritik_saran')->withSuccess('Kritik & Saran berhasil dikirim.');
}


}
