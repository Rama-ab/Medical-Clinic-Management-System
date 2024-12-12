<?php

namespace App\Http\Controllers;

use App\Models\MedicalFile;
use Illuminate\Http\Request;

class MedicalFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $medicalFiles = MedicalFile::whereHas('patient', function($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                     ->orwhere('insurance_number' , 'LIKE' , "%{$search}%");
            })->get();
        } else {
            $medicalFiles = MedicalFile::all();
        }
        return view('medicalFiles.index', compact('medicalFiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalFile $medicalFile)
    {
        return  view('medicalFiles.show' , compact('medicalFile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
