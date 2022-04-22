<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\File;
use Illuminate\Http\Request;

class UserAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar fitxer
       $validatedData = $request->validate([
        'upload' => 'required|mimes:gif,jpeg,jpg,png|max:2048'
        ]);
    
        // Obtenir dades del fitxer
        $upload = $request->file('upload');
        $fileName = $upload->getClientOriginalName();
        $fileSize = $upload->getSize();

        // Pujar fitxer al disc dur
        $uploadName = time() . '_' . $fileName;
        $filePath = $upload->storeAs(
            'uploads',      // Path
            $uploadName ,   // Filename
            'public'        // Disk
        );
    
        if (\Storage::disk('public')->exists($filePath)) {
            $fullPath = \Storage::disk('public')->path($filePath);
            // Desar dades a BD
            $file = File::create([
                'filepath' => $filePath,
                'filesize' => $fileSize,
            ]);
            $idf = $file-$id;
            User::create([
                'avatar_id' => $idf,
            ]);
            return redirect()->route('files.show', $file);
        } else {
            return redirect()->route("files.create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idf = DB::table('users')
              ->where('id', $id)
              ->update(['avatarid' => $file-$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
