<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        // dump($request->berkas);

        // return "Pemrosesan file upload di sini";
        
        // if($request->hasFile('berkas'))
        // {
        //     echo "path(): ". $request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ". $request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ". $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ". $request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ". $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ". $request->berkas->getSize();
        // }
        // else 
        // {
        //     echo "Tidak ada berkas yang diupload";
        // }

        $request->validate([
            // 'berkas' => 'required',
            'berkas' => 'required|file|image|max:500',
        ]);
        $extFile = $request->berkas->getClientOriginalName();
        // $namaFile = 'web-'.time().".".$extFile;
        // $path = $request->berkas->storeAs('public',$namaFile );
        
        $namaFile = $request->namaBerkas;
        
        $path = $request->berkas->move('gambar',$namaFile );
        
        // echo "Variable path berisi:$path <br>";

        // $pathBaru=asset('storage/'.$namaFile);
        $pathBaru=asset('gambar/'.$namaFile); 
        
        // echo "proses upload berhasil, file berada di: $path";
        
        echo "Gambar berhasil di upload ke <a href='$pathBaru'>$namaFile</a>";
        echo "<br> <br>";
        echo "<img src='$path' alt='$namaFile' width='50%' height='50%'>";
        // echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
        // echo $request->berkas-getClientOriginalName(),"lolos validasi";
    }
}