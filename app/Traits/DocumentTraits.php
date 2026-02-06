<?php

namespace App\Traits;

use App\Models\Document;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser as PdfParser;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpSpreadsheet\IOFactory as ExcelReader;
use Illuminate\Support\Facades\Storage;

trait DocumentTraits
{
  private function fetchDocuments()
	{
		return Document::latest()->paginate(10);
	}


	private function fetchDocument($id)
  {
    return Document::findorFail(decrypt($id));
  }


	private function saveDocument($request)
	{
		$file = $request->file('document');
    
		// upload document
    $path = $file->store('public/documents');

		$extension 	= $file->getClientOriginalExtension();
    $filename 	= $file->getClientOriginalName();

    $contentText = $this->extractText($file, $extension);

		if (empty($text)) {
      return back()->withErrors([
        'document' => 'Invalid PDF. This appears to be a scanned PDF file and has no selectable text.',
      ]);
    }

		// remove unnecessary spaces
    $contentText = preg_replace('/\s+/', ' ', $contentText);

		// lower texts
    $contentText = strtolower($contentText);
		
		// start - saving routine
		$document = new Document;
		$document->filename 		= $filename;
		$document->filepath 		= $path;
		$document->filetype 		= $extension;
		$document->content_text = $contentText;
		$document->save();
		// end - saving routine
	}


	private function extractText($file, $extension)
  {
    switch ($extension) {
      case 'pdf':
        return $this->extractPdf($file);

      case 'docx':
        return $this->extractDocx($file);

      case 'txt':
        return file_get_contents($file->getRealPath());

      case 'xlsx':
      case 'xls':
        return $this->extractExcel($file);

      default:
          return '';
    }
  }


  private function extractPdf($file)
  {
    $parser = new PdfParser();
    $pdf 		= $parser->parseFile($file->getRealPath());

    return trim($pdf->getText());
  }


  private function extractDocx($file)
  {
    $phpWord = IOFactory::load($file->getRealPath());
    $text = '';

    foreach ($phpWord->getSections() as $section) {
      foreach ($section->getElements() as $element) {
        if (method_exists($element, 'getText')) {
          $text .= $element->getText() . ' ';
        }
      }
    }

    return $text;
  }


  private function extractExcel($file)
  {
    $spreadsheet = ExcelReader::load($file->getRealPath());
    $text = '';

    foreach ($spreadsheet->getAllSheets() as $sheet) {
      foreach ($sheet->toArray() as $row) {
        $text .= implode(' ', $row) . ' ';
      }
    }

    return $text;
  }


	public function download($id)
  {
    $document = Document::findOrFail($id);

    // Ensure the file exists
    if (!Storage::exists($document->filepath)) {
      abort(404, "File not found");
    }

    return Storage::download($document->filepath, $document->filename);
  }


	public function deleteDocument($id)
	{
		$document = $this->fetchDocument($id);
		
    if (Storage::exists($document->filepath)) {
      Storage::delete($document->filepath);
    }

		$document->delete();		
	}

}


