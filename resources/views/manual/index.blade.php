@extends('layout.app')

@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

  <div class="card">
    <div class="card-header h4 bg-light">
      User Manual
    </div>
		<div class="card-body">

      <!-- start row -->
      <div class="row">
        <div class="col">
          <div class="card bg-light">
            <div class="card-body">

              <ul>
                <li>
                  <a href="manual#introduction">Introduction</a>
                </li>
                <li>
                  <a href="manual#flowchart">Flowchart</a>
                </li>
								<li>
                  <a href="manual#dashboard">Dashboard</a>
                </li>
								<li>
                  <a href="manual#upload-document">Upload Document</a>
                </li>
                <li>
                  <a href="manual#user-account">User Account</a>
                </li>                
              </ul>

            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

      <!-- start row -->
      <div class="row mt-3">
        <div class="col">
          <div class="card">
            <div class="card-header h5 bg-light header-guide" id="introduction">
              INTRODUCTION
            </div>
            <div class="card-body">
              Document search is....

              <br/><br/>

              URL Address: <span class="text-primary">http://mydomain.com</span>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

      <!-- start row -->
      <div class="row mt-3">
        <div class="col">
          <div class="card">
            <div class="card-header h5 bg-light header-guide" id="flowchart">
              BASIC FLOWCHART
            </div>
            <div class="card-body">
              flowchart here
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

      <!-- start row -->
      <div class="row mt-3">
        <div class="col">
          <div class="card">
            <div class="card-header h5 bg-light header-guide" id="dashboard">
              DASHBOARD
            </div>
            <div class="card-body">
              The dashboard shows...
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

      

      <!-- start row -->
      <div class="row mt-3">
        <div class="col">
          <div class="card">
            <div class="card-header h5 bg-light header-guide" id="upload-document">
              UPLOAD DOCUMENT
            </div>
            <div class="card-body">
              <p>The upload module is where administrators can upload / delete files.</p>

              <div class="alert alert-info">
                <p class="font-monospace">[ HOW TO: ]</p>
                <ol>
                  <li>Click the <code>UPLOAD</code> on the left sidebar.</li>
                  <li>Browse the desired file.</li>
                  <li>Click the <code>Upload FIle</code> button to upload.</li>
                </ol>
              </div>

              <i class="text-muted">
                * Only text searchable enabled files can be uploaded.
							</i>

            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

      <!-- start row -->
      <div class="row mt-3">
        <div class="col">
          <div class="card">
            <div class="card-header h5 bg-light header-guide" id="user-account">
              USER ACCOUNT
            </div>
            <div class="card-body">
              <p>
                The user module is where the administrator user accounts are being registered.
              </p>
              
							<div class="alert alert-info">
                <p class="font-monospace">[ HOW TO: ]</p>
                <ol>
                  <li>Click the <code>USER ACCOUNT</code> on the left sidebar.</li>
                  <li>Click the <code>ADD NEW</code> button to add new user account.</li>
                  <li>Click the desired user account to update an existing account.</li>
                </ol>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

		</div>
	</div>


</div>
</div>





<div class="position-fixed bottom-0 start-50 translate-middle-x mb-3 text-center hand">
  <a href="manual#" class="text-primary">
    <i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i>
    <br/>
    BACK TO TOP
  </a>
</div>








































@endsection
