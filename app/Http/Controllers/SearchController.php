<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Traits\SearchTraits;
class SearchController extends Controller
{
	use SearchTraits;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('index')
			->with('show_results', false);
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
    $query = strtolower($request->input('query'));

    // tokenize search query
    $queryTokens = $this->tokenize($query);

    $documents = $this->fetchDocuments();

    $results = [];

    foreach ($documents as $doc) {
      $docTokens = $this->tokenize($doc->content_text);

      $similarity = $this->cosineSimilarity($queryTokens, $docTokens);

      if ($similarity > 0) {
        $results[] = [
          'document'   => $doc,
          'percentage' => round($similarity * 100, 2),
        ];
      }
    }

    // sort by highest relevance
    usort($results, fn ($a, $b) => $b['percentage'] <=> $a['percentage']);
		
    return view('index')
			->with('show_results', true)
			->with('results', $results)
			->with('query', $query)
		;
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
      //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
      //
  }


	public function search(Request $request)
  {
    
  }
}
