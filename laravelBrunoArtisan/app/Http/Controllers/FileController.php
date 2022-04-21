<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("files.index", [
            'files' => File::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("files.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Upload file
        $upload = $this->_upload($request);

        if ($upload) {
            // Inserir dades a BD
            $file = File::create([
                'filepath' => $upload['filepath'],
                'filesize' => $upload['filesize'],
            ]);
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('files.show', $file)
                ->with('success', 'File successfully saved');
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("files.create")
                ->with('error', 'ERROR uploading file');
        }
    }

    /**
     * Refactor used at store and update
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|bool
     */
    private function _upload(Request $request)
    {
        // Validar fitxer
        $validatedData = $request->validate([
            'upload' => 'required|mimes:gif,jpeg,jpg,png|max:2048'
        ]);
        
        // Obtenir dades del fitxer
        $upload = $request->file('upload');
        $fileName = $upload->getClientOriginalName();
        $fileSize = $upload->getSize();
        \Log::debug("Storing file '{$fileName}' ($fileSize)...");

        // Pujar fitxer al disc dur
        $uploadName = time() . '_' . $fileName;
        $filePath = $upload->storeAs(
            'uploads',      // Path
            $uploadName ,   // Filename
            'public'        // Disk
        );

        $exists = \Storage::disk('public')->exists($filePath);
        if ($exists) {
            \Log::debug("Local storage OK");
            $fullPath = \Storage::disk('public')->path($filePath);
            \Log::debug("File saved at {$fullPath}");
        } else {
            \Log::debug("Local storage FAILS");
        }

        return $exists ? [
            'filepath' => $filePath, 
            'filesize' => $fileSize, 
        ] : null;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view("files.show", [
            'file' => $file
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view("files.edit", [
            'file' => $file
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        // Upload file
        $upload = $this->_upload($request);

        if ($upload) {
            // Actualitzar dades a BD
            $file->filepath = $upload['filepath'];
            $file->filesize = $upload['filesize'];
            $file->save();
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('files.show', $file)
                ->with('success', 'File successfully saved');
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("files.edit")
                ->with('error', 'ERROR uploading file');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $id = $file->id;
        // Eliminar fitxer del disc 
        \Storage::disk('public')->delete($file->filepath);
        \Log::debug("Local storage OK");
        // Eliminar registre de BD
        $file->delete();
        \Log::debug("DB storage OK");
        // Patró PRG amb missatge d'èxit
        return redirect()->route("files.index")
            ->with('success', "File {$id} succesfully deleted.");
    }
}
