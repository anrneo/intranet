@extends('layouts.app')
@section('content')


<form id="dataformajax">
    <div class="form-group" >
      <label for="exampleInputEmail1">cc</label>
      <input type="text" class="form-control" id="ccajax" aria-describedby="emailHelp" placeholder="cc">
    </div>
   
    
    <button type="submit" class="btn btn-primary">Consultar get</button>
  </form>
<br><br>

  <form id="dataformajax1">
    <div class="form-group" >
      <label for="exampleInputEmail1">cc</label>
      <input type="text" class="form-control" id="ccajax1" aria-describedby="emailHelp" placeholder="cc">
    </div>
   
    
    <button type="submit" class="btn btn-primary">Consultar post</button>
  </form>

@endsection
