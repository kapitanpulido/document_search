@if ($errors->any())
  <div class="clearfix"></div>
    <div class="alert alert-danger" id="err_msg_new_registration_backend">
      <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i>
      Ooops... it seems like you missed something:<br/><br/>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{!! $error !!}</li>
        @endforeach
      </ul>
    </div>
  <div class="clearfix"></div>
@endif
