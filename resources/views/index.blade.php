<!DOCTYPE html>
<html lang="en">
<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="theme-color" content="#ffffff">

	<meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">

	<link rel="shortcut icon" href="{{ asset('img/document.ico') }}">
	
	@vite(['resources/sass/style.scss', 'resources/js/function.js'])
</head>

<body class="bg_2">


<div class="container vh-100">
  <div class="row h-50 justify-content-center align-items-center">
    <div class="col-auto w-75 h-25 text-center text-white">

			<span class="fs_1">
				<i class="fa-solid fa-magnifying-glass"></i> Explore...
			</span>

			<br/>
			
			<span class="fs-3">Instantly search uploaded documents.</span>

      <div class="card" style="width: 100%; height:70%">
        <div class="card-body ps-5 pe-5 pt-3">
          
		      {{ html()->form('POST', '/')->id('search_form')->open() }}
						<div class="input-group mb-3">
							<input type="text" class="form-control bg_1" name="query" placeholder="Enter keywords..." required>
							<button type="submit" class="btn btn-primary btn-lg">Search</button>
						</div>
					{{ html()->form()->close() }}

        </div>
      </div>
    </div>
		
  </div>

	@if($show_results)

		<div class="card w-100">
			<div class="card-body">
				<span class="fs-4">Search Results for: <span class="fw-bold">{{ $query }}</span></span>

	      @if(count($results) === 0)
	        <div class="alert alert-danger">
						<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
						No relevant documents found.
					</div>
	      @else
					<table class="table table-striped" border="1" cellpadding="8" cellspacing="0" width="30%">
		        <thead>
	            <tr>
                <th>Filename</th>
                <th>Relevance (%)</th>
	            </tr>
		        </thead>
		        <tbody id="results-body">
	            @foreach($results as $result)
	                 
								<tr class="result-row" style="display:none;">
							    <td class="filename">
							      <a href="{{ route('documents.download', $result['document']->id) }}" target="_blank" class="fs-5 text-decoration-none link-primary" >
							        {{ $result['document']->filename }}
							    	</a>
							    </td>
							    <td width="50%" class="percentage" data-percentage="{{ $result['percentage'] }}">
						        <div class="progress-container" style="background:#eee; width:100%; height:25px; border-radius:5px;">
					            <div class="progress-bar text-start ps-1" style="background:#4CAF50; width:0%; height:100%; border-radius:5px; color:white; text-align:center;">
					              0%
					            </div>
						        </div>
							    </td>
								</tr>

	            @endforeach
		        </tbody>
		      </table>
				@endif

	      
			</div>
		</div>
	@endif



	<div id="google_translate_element" class="position-absolute bottom-0 start-0"></div>
</div>




<script type="text/javascript">
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: '', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	}



	document.addEventListener('DOMContentLoaded', () => {
  const rows = document.querySelectorAll('.result-row');
  let rowIndex = 0;

  function typeRow(row) {
    row.style.display = '';
    const filenameCell = row.querySelector('.filename');
    const link = filenameCell.querySelector('a');
    const filenameText = link.innerText;

    link.innerText = ''; // clear text for typing

    const progressBar = row.querySelector('.progress-bar');
    
    const percentageText = progressBar.innerText;
    const finalPercentage = parseFloat(progressBar.getAttribute('data-percentage')) || 0;

    // 1️⃣ Typing effect for filename
   	let i = 0;
		const typingInterval = setInterval(() => {
	  let char = filenameText.charAt(i);
	  link.innerText += char === ' ' ? '\u00A0' : char;
	  i++;
	  if (i >= filenameText.length) clearInterval(typingInterval);
	}, 25);
    // 2️⃣ Animate progress bar
    let progress = 0;
    const progressInterval = setInterval(() => {
      if (progress >= finalPercentage) {
        progressBar.style.width = finalPercentage + '%';
        progressBar.innerText = finalPercentage + '%';
        clearInterval(progressInterval);
      } else {
        progress++;
        progressBar.style.width = progress + '%';
        progressBar.innerText = progress + '%';
      }
    }, 15); // speed of the progress animation
  }

  function showNextRow() {
    if (rowIndex < rows.length) {
      typeRow(rows[rowIndex]);
      rowIndex++;
      setTimeout(showNextRow, 400); // delay between rows
    }
  }

  // Before starting, attach data-percentage to each progress bar
  rows.forEach(row => {
    const progressBar = row.querySelector('.progress-bar');
    const percentage = row.querySelector('.percentage').dataset.percentage || row.querySelector('.percentage').innerText.replace('%','');
    progressBar.setAttribute('data-percentage', percentage);
  });

  showNextRow();
});
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


</body>

</html>
