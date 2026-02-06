<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\DocumentTraits;

class DocumentController extends Controller
{
	use DocumentTraits;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $documents = $this->fetchDocuments();

  	return view('upload.index')
			->with('documents', $documents);
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
    $request->validate([
      'document' => 'required|file|mimes:pdf,docx,txt,xlsx,xls|max:10240',
    ]);    
    
		$this->saveDocument($request);

    return redirect()->route('upload.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
      //
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
    $this->deleteDocument($id);

		return redirect()->route('upload.index')->with('success', '<i class="fa-solid fa-circle-check"></i> Document deleted successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
      //
  }
}
