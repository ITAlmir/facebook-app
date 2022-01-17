@extends('layout/App')
@section('title','Sing up')
@section('main')

<h1>SING UP</h1>

<main id="main">
<form action="/users" method="post">
@if(Session::has('success'))
   <div class="green"><b>{{Session::get('success')}}!Please <a href="/login">click here</a> to Login</b></div>
    @endif
    @if(Session::has('fail'))
   <div> <p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">{{Session::get('fail')}}!Please try again.</p></div>
    @endif
{{ csrf_field() }}
<br><br>
<label for="firstname"> firstname :</label>
<input type="text" size = "25" name="firstname" value="{{old('firstname')}}">
<p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
@if (count($errors)>0)
@error('firstname'){{$message}}@enderror
@endif
</p>
<label for="lastname"> lastname :</label>
<input type="text" size = "25" name="lastname" value="{{old('lastname')}}">
<p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
@if (count($errors)>0)
@error('lastname'){{$message}}@enderror
@endif
</p>
<label for="password"> password :</label>
<input type="password" size = "25" name="password" />
<p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
@if (count($errors)>0)
@error('password'){{$message}}@enderror
@endif
</p>
<label for="confirm_password">confirm password :</label>
<input type="password" size = "25" name="confirm_password"  >
<p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
@if (count($errors)>0)
@error('confirm_password'){{$message}}@enderror
@endif
</p>
<label for="age"> age :</label>
<input type="text" size = "25" name="age" value="{{old('age')}}">
<p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
@if (count($errors)>0)
@error('age'){{$message}}@enderror
@endif
</p>
<label for="email"> email :</label>
<input type="text" size = "25" name="email" value="{{old('email')}}">
<p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
@if (count($errors)>0)
@error('email'){{$message}}@enderror
@endif
</p>
<input type="submit" name="submit" value="Register" />
<br>  <br>  
    </form>

<br>
<p>Or <a href="login">Login</a> if you already have account</p>
</main>  
@endsection
