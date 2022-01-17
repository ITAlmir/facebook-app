@extends('layout/App')
@section('title','Dashboard')
@section('main')
<?php
session(['name' => $data->firstname]);
session(['email' => $data->email]);
$table='comments';
//dd($comment);
?>
   <div><p><img class="thumb"  src="images/{{$data->thumbnail}}" alt="thumbnail">
   <h6>Wellcome,{{$data->firstname}}! </h6></p>
   <a href="logout">
   <table class="logout">
   <td>Logout</td>
   
   </table></a><br>
   <table >
      <td>
      <a href="uploadImg">add/edit</a>
      </td>
      <td class="leftBorder">
      <a href="/deleteImg/{{$data->id}}">delete</a>
      </td>
   </table>
   <hr></div>
   <br>
   <div>{{$data->id}}
   <form method='get' action='#'>
         @csrf
         <input type="submit" name="add_news" value="ADD NEWS" >
      </form>
   <?php
   if(isset($_GET['add_news'])){
    echo " 
    <h6>ADD NEWS</h6><label for='addnews'>News Text :</label> <br>
    <form method='post' action='/news' enctype='multipart/form-data'>"?>
    @csrf
   <?php echo "<textarea name='addnews' rows='20' cols='70'></textarea><br>
   <label for='fup_name'>Your text subject :</label>
   <input type='text' name='fup_name'><br><br>
   <label for='image'>upload picture :</label>
   <input type='file' name='image' value='Upload Image'><br><br>
   <input type='submit' name='create_news' value='Create News'>
   </form>";
   }
   ?>
   </div>
   <div>
   <p>
   @foreach($comment as $comments)   
   <div id='' class='newsstyle'><p><b><img class="thumbComment" 
    src="images/{{$comments->thumbnail}}" alt="thumbnail">
      {{$comments->firstname}} {{$comments->lastname}}</b> 
      <span class='commentDate'>published: {{$comments->created_at->diffForHumans()}}</span></p><hr>
      <h3>{{$comments->title}}</h3>
               <p> <img src='images/{{$comments->news}}' 
                style='float: left; margin: 0px 15px 15px 0px;' width='300px' alt='redfb news' title=''>
                {{$comments->newsText}}
              <?php
         
             if(Session::get('name')=='Administrator' && Session::get('loginId')==1){
   echo '<p align="right"><a href="/delete/'.$comments->id .'">[ remove news ]</a></p>';
                   } elseif(Session::get('name')==$data->firstname && Session::get('email')==$comments->email){
                     echo '<br style="clear: both;" />
                     <p align="right"><a href="/delete/'.$comments->id .'">[ remove news ]</a></p>';
                                     }
                   ?><br style='clear: both;' />
                   <form method="post" action="/addpostcomment"><br>
                   @csrf
                    <label for="commented">comment:</label>
                    <textarea name="commented" rows="3" cols="65"></textarea><br>
                    <input type="submit" name="addcomment" value="send comment"><br> 
                    <p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
                    @if (count($errors)>0)
@error('commented'){{$message}}@enderror
@endif</p>
                    </form>       
               </p> <br style='clear: both;' />
             <p align="center"> <a href="/users/{{$comments->id}}"><b>show comments</b></a></p>
   
            </div>
               
               @endforeach
                                   
@endsection
