<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\File;
use Illuminate\Http\Request;

class UserAdminController extends Controller
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
        $request->validate([
            'upload' => "required|image|mimes:jpg,png,gif|max:2000"
        ]);
        $fileSize = $upload->getSize();
        $filePath = $upload->storeAs(
            'uploads',      // Path
            $uploadName ,   // Filename
            'public'        // Disk
        );
        if (\Storage::disk('public')->exists($filePath)) {
            DB::table('users')
              ->where('id', $file-$id)
              ->update(['avatarid' => $id]);
            
              return redirect()->route('files.index')
            ->with('success', 'File successfully updated');
        } else{
            return redirect()->route('files.edit')
            ->with('error', 'File unsuccessfully updated');
        }
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
