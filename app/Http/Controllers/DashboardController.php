<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Document;

use App\Traits\DashboardTraits;

class DashboardController extends Controller
{
	use DashboardTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $documents 			= $this->fetchDocuments();
			$document_datas = $this->fetchDocumentData();

    	return view('dashboard.index')
				->with('documents', $documents)
				->with('document_counts', $document_datas['counts'])
				->with('week_ranges', $document_datas['week_ranges'])
			;
    }
}
