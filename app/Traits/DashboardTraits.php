<?php

namespace App\Traits;

use App\Models\Document;

trait DashboardTraits
{
  private function fetchDocuments()
	{
		return Document::latest()->paginate(10);
	}


	private function fetchDocumentData()
  {
    $week_number_end = now()->format('W');
    $week_number_start = $week_number_end - 12;

    $week_ranges = $this->weekNumberRange($week_number_start, $week_number_start, $week_number_end);

    $year_now 	= $year = now()->format('Y');
    $year_last 	= $year_now - 1;

    $end_date = $this->weekRange($week_number_end, $year);

    if($week_ranges[0] > $week_ranges[count($week_ranges)-1]){
			$year = $year_last;
		}      

    $begin_date = $this->weekRange($week_ranges[0], $year);
    $begin_date = $begin_date['week_start'] . ' 00:00:00'; $begin_date = CarbonParse($begin_date);
    $end_date = dateFormat($end_date['week_end']) . ' 23:59:59'; $end_date = CarbonParse($end_date);

    $documents = Document
			::whereBetween('created_at', [$begin_date, $end_date]);
		
		
		$documents = $documents->get(['id', 'created_at']);

    $document_progress = [];

    foreach($week_ranges as $week_range){
      $year = $year_now;

      if($week_ranges[0] >= 44){
        if($week_range >= 44 && $week_range <= 52)
          $year = $year_last;
      }

      if(in_array(1, $week_ranges)){
				if($week_range > 20 && $week_range < 52){
					$year = $year_last;
				}          
			}
        

      $date_range = $this->weekRange($week_range, $year);
      if($week_range == 1){
        $start_date = $year_last . '-12-31';
        $end_date = $date_range['week_end'];

        $date_range = [
          "week_start"  => $start_date,
          "week_end"    => $end_date
        ];
      }

      $start_date = CarbonParse($date_range['week_start'] . ' 00:00:00');
      $end_date   = CarbonParse(dateFormat($date_range['week_end']) . ' 23:59:59');

      $document_per_week = $documents
				->where('created_at', '>=', $start_date)
				->where('created_at', '<=', $end_date)
				->count();

      $document_progress[] = $document_per_week;
    }

    return [
      'week_ranges' => $week_ranges,
      'counts'      => $document_progress
    ];
  }


	private function weekNumberRange($state, $week_number_start, $week_number_end)
  {
    if($state < 1){
      
      $week_max = 52 ;

			$last_year = [];
      for($i = -1 ; $i >= $week_number_start ; $i--){
				$last_year[] = $week_max--;
			}
        
      $this_year = [];
      for($i = 1 ; $i <= $week_number_end ; $i++){
				$this_year[] = $i;
			}

      $last_year 		= array_reverse($last_year);
      $week_ranges 	= array_merge($last_year, $this_year);
    }
    else{
      $this_year = [];
      for($i = $week_number_start ; $i <= $week_number_end ; $i++){
				$this_year[] = $i;
			}
        
      $week_ranges = $this_year;
    }

    return $week_ranges;
  }


  private function weekRange($week, $year) {
    $dto = new \DateTime();
    $dto->setISODate($year, $week);
    $ret['week_start'] = $dto->format('Y-m-d');
    $dto->modify('+6 days');
    $ret['week_end'] = $dto->format('Y-m-d');
    return $ret;
  }
}
