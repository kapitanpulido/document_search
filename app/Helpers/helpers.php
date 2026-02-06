<?php


function routeName()
{
  return Route::current()->getName();
}


function CarbonParse($date)
{
  return $date != '' ? \Carbon\Carbon::parse($date) : '-';
}


function dateFormat($date, $is_Ymd = false)
{
  if($date){
		if($is_Ymd){
			return CarbonParse($date)->format('Y-m-d');
		}

		return CarbonParse($date)->format('m/d/Y');
	}
    
  else
    return '-';
}


function timeFormat($date)
{
  return CarbonParse($date)->format('H:i');
}


function dateTimeFormat($date, $is_plain = false)
{
  if($date)
		if($is_plain){
			return dateFormat($date) . ' ' . timeFormat($date);
		}
    else{
			return dateFormat($date) . " <span class='text-muted'>" . timeFormat($date) . "</span>";
		}
  else
    return '-';
}


function activeLink($haystack, $needle, $excluded = null)
{
	$status = '';

  if(str_contains($haystack, $needle)){
		$status = 'active';
	}

	if($excluded){
		if(str_contains($haystack, $excluded)){
			$status = '';
		}
	}

	return $status;
}


function breadCrumbs()
{
	return str_replace('.', ' > ', str_replace(['.index', '.store', '.show'], '', routeName()));
}


function mime($extension)
{
  switch($extension){
		case 'xls':
		case 'xlsx':
      $label = '<i class="fa-solid fa-file-excel fa-2x text-success"></i>'; break;
    case 'pdf':
      $label = '<i class="fa-solid fa-file-pdf fa-2x text-danger"></i>'; break;
    case 'doc':
		case 'docx':
      $label = '<i class="fa-regular fa-file-word fa-2x text-primary"></i>'; break;
    case 'txt':
      $label = '<i class="fa-regular fa-file-lines fa-2x text-info"></i>'; break;
    default:
      $label = '<i class="fa-solid fa-file fa-2x"></i>'; break;
  }

  return $label;
}


function myID()
{
	return \Auth::user()->id;
}


function myDepartment()
{
	return \Auth::user()->department_id;
}


function activeOptions()
{
  $array = explode('.', routeName());
  $route = end($array);

  if($route == 'create'){
    return ['1' => 'Active'];
  }

  return [
    '1' => 'Active',
    '0' => 'Inactive'
  ];
}


function showNotification($action, $message)
{
  switch($action){
    case "success":
      $icon = '<i class="fa fa-check-circle text-success" aria-hidden="true"></i> '; break;
    case "error":
      $icon = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '; break;
    case "warning":
      $icon = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '; break;
    case "info":
      $icon = '<i class="fa fa-info-circle" aria-hidden="true"></i> '; break;
    default:
      $icon = '<i class="fa fa-question-circle" aria-hidden="true"></i> '; break;
  }

  Flash::$action($icon . $message);
  Session::flash('flash_message', [$action, $message]);
}