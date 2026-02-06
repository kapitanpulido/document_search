<?php

namespace App\Traits;

use App\Models\Document;

trait SearchTraits
{
  private function fetchDocuments()
	{
		return Document::whereNotNull('content_text')->get();
	}


	private function tokenize($text)
  {
    $text = preg_replace('/[^a-z0-9\s]/i', '', $text);
    $words = preg_split('/\s+/', strtolower($text));

    // basic stop words
    $stopWords = ['the','and','is','to','of','in','a','for','on','with','as','by'];

    return array_values(array_diff($words, $stopWords));
  }


  private function termFrequency($tokens)
  {
    $tf = [];
    $count = count($tokens);

    foreach ($tokens as $token) {
        $tf[$token] = ($tf[$token] ?? 0) + 1;
    }

    foreach ($tf as $term => $freq) {
        $tf[$term] = $freq / $count;
    }

    return $tf;
  }

	
  private function cosineSimilarity($queryTokens, $docTokens)
  {
    $queryTF = $this->termFrequency($queryTokens);
    $docTF   = $this->termFrequency($docTokens);

    $terms = array_unique(array_merge(
        array_keys($queryTF),
        array_keys($docTF)
    ));

    $dotProduct = 0;
    $queryMag = 0;
    $docMag = 0;

    foreach ($terms as $term) {
        $q = $queryTF[$term] ?? 0;
        $d = $docTF[$term] ?? 0;

        $dotProduct += $q * $d;
        $queryMag += $q ** 2;
        $docMag += $d ** 2;
    }

    if ($queryMag == 0 || $docMag == 0) {
        return 0;
    }

    return $dotProduct / (sqrt($queryMag) * sqrt($docMag));
  }

}


