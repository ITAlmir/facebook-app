@extends('layout/App')
@section('title','Dashboard')
@section('main')
<?php
use App\Models\user;
$data = new User;
$data = user::where('id','=',Session::get('loginId'))->first();
session(['post_id' => $comments->id]);
session(['id' => $data->id]);
?>
<div>
<table class="uploadButton">
      <td>
      <b><a href="/dashboard"><<<< Go back</a></b>
      </td>
   </table>
   <p>
   <div id='' class='newsstyle'><p><b><img class="thumbComment" 
    src="/images/{{$comments->thumbnail}}" alt="thumbnail">
      {{$comments->firstname}} {{$comments->lastname}}</b> 
      <span class='commentDate'>published: {{$comments->created_at->diffForHumans()}}</span></p><hr>
      <h3>{{$comments->title}}</h3>
               <p> <img src='/images/{{$comments->news}}' 
                style='float: left; margin: 0px 15px 15px 0px;' width='300px' alt='redfb news' title=''>
                {{$comments->newsText}}
              <br style='clear: both;' />
                   <form method="post" action="/addpostcomment"><br>
                   @csrf
                    <label for="comment">comment:</label>
                    <textarea name="commented" rows="4" cols="65"></textarea><br>
                    <p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
                    @if (count($errors)>0)
@error('commented'){{$message}}@enderror
@endif</p>
                    <input type="submit" name="addcomment" value="send comment"><br> 
           </form> <br>
         
           @foreach($comments->postcomments as $comms) 
           <p id='' class='comstyle'><b><img class="thumbComment" 
        src="/images/{{$comms->thumbnail}}" alt="thumbnail">
      {{$comms->firstname}} {{$comms->lastname}}</b>
      <span class='commentDate'>published: {{$comms->created_at->diffForHumans()}}</span><br> <br> 
      {{$comms->commented}} <br style='clear: both;' />
      <?php
         
         if(Session::get('name')=='Administrator' && Session::get('loginId')==1){
echo '<a align="right" href="/deletecomment/'.$comms->id .'">[ remove comment ]</a>';
               } elseif(Session::get('name')==$comms->firstname && Session::get('id')==$comms->user_id){
                 echo '<br style="clear: both;" />
                 <a align="right" href="/deletecomment/'.$comms->id .'">[ remove comment ]</a>';
                                 }
               ?>
    </p>   
   @endforeach  
               </p> <br style='clear: both;' />
               </div>

@endsection
