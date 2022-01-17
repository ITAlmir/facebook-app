@extends('layout/App')
@section('title','Login')
@section('main')

<h1>Login</h1>

<form action="{{route('logged')}}" method="post">
    @if(Session::has('success'))
    <div class="green"><b>
    {{Session::get('success')}}!Please <a href="/login">click here</a> to Login</b></div>
    @endif
    @if(Session::has('fail'))
   <div> <p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
   {{Session::get('fail')}}!</p></div>
    @endif
{{ csrf_field() }}
<br><br>
<label for="email"> email :</label>
<input type="text" size = "25" name="email" value="{{old('email')}}">
<p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
@if (count($errors)>0)
@error('email'){{$message}}@enderror
@endif
</p>
<label for="password"> password :</label>
<input type="password" size = "25" name="password" value="">
<p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
@if (count($errors)>0)
@error('password'){{$message}}@enderror
@endif
</p>
<input type="submit" name="submit" value="Login" >
<br>  <br>  
</form>
<br style='clear: both;' />
@endsection

