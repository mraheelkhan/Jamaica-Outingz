@if(Session::has('info'))
  <div class="alert alert-info mt-2 notification notice closeable">
    <p>{{Session::get('info')}}</p>
    <a class="close"></a>
  </div>

@elseif(Session::has('success'))
  <div class="alert alert-success mt-2 notification success closeable">
    <p>{{Session::get('success')}}</p>
    <a class="close"></a>
  </div>
@elseif(Session::has('danger'))
  <div class="alert alert-danger mt-2 notification error closeable">
    <p>{{Session::get('danger')}}</p>
    <a class="close"></a>
  </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif