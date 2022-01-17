<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\user;
use App\Models\comment;
use App\Models\postcomment;
use Hash;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments =DB::table(comment)->sortBy('id', 'desc')
        ->get();
        return view('users.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user = new user;
        $this->validate($request,[
            'email'=>'required|unique:users|email|max:50',
            'firstname'=>'required|max:50',
            'password'=>'required|max:50|required_with:confirm_password|same:confirm_password',
            'lastname'=>'required|max:50',
            'age'=>'required|max:50',
        ]);


        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->age = $request->age;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $res = $user->save();             
        if($res){
            return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Something got wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =array();
            $data = user::where('id','=',Session::get('loginId'));
            $comments = new comment;
            $comments = comment::all();
            $postcomments = comment::find($id);
        return view('commentsshow')->with('comments',$postcomments);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\user $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function deleteComment($id)
    {
    $data = Postcomment::all();
	$data = Postcomment::find($id);
	$data->delete();
	
    return back();
    }
    public function logged(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|max:50',
            'password'=>'required|max:50',
        ]);
         $user = user::where('email','=',$request->email)->first();   
         if($user){
             if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('/dashboard');
             }else{
                return back()->with('fail','Something got wrong');
             }
         }else{
            return back()->with('fail','Something got wrong');
         }           
    }
    public function dashboard(Request $request)
    {
        $data =array();
        if(Session::has('loginId')){
            $data = user::where('id','=',Session::get('loginId'))->first(); 
           // $comment = comment::with('postcomments')->get();
            $postcomments = postcomment::get();
            $comments =comment::all();
           $comment = comment::orderBy('id', 'DESC')->get();
            //$postcomments=postcomment::with('comments')->get();
        }
       return view('dashboard',compact('data','comment','postcomments','comments'));
    }
    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
    public function uploadThumbnail(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName,'public');
        $data = user::where('id','=',Session::get('loginId'))->first(); 
        User::find($data->id)->update(['thumbnail'=>$imageName]);
return redirect('dashboard');
    }
    public function uploadnews(Request $request)
    {
        $comment = new comment;
        $this->validate($request,[
            'addnews'=>'max:5000',
            'fup_name'=>'max:45',
            'image'=>'required',
        ]);
        $imageNews = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageNews,'public');
        $data = user::where('id','=',Session::get('loginId'))->first();
        $comment->firstname=$data->firstname;
        $comment->lastname=$data->lastname;
        $comment->email=$data->email;
        $comment->user_id=$data->id;
        $comment->news=$imageNews;
        $comment->newsText=$request->addnews;
        $comment->title=$request->fup_name;
        $comment->thumbnail=$data->thumbnail;
        $res = $comment->save();
        

        
        return redirect('dashboard');
    }
     function deleteNews($id)
    {
    $data = Comment::all();
	$data = Comment::find($id);
	$data->delete();
	
    return redirect('dashboard');
    }
    public function uploadcomment(Request $request)
    {
        $comment = new comment;
        $this->validate($request,[
            'commented'=>'max:200',
        ]);
        $comment->comment=$request->commented;
        $res = $comment->save();

        return redirect('dashboard');
    }
    function deleteImg(Request $request)
    {
    $data = new User;
    $data = user::where('id','=',Session::get('loginId'))->first();
    $data->thumbnail = "avatar.jpg";
    $data->save();
	
    return redirect('dashboard');
    }
    function addpostcomment(Request $request)
    {
        $data = new User;
        $data = user::where('id','=',Session::get('loginId'))->first();
        $addpostcom = new postcomment;

        $this->validate($request,[
            'commented'=>'required|max:1000',
        ]);
    
    $addpostcom->firstname=$data->firstname;
    $addpostcom->lastname=$data->lastname;
    $addpostcom->thumbnail=$data->thumbnail;
    $addpostcom->commented=$request->commented;
    $addpostcom->user_id = $data->id;
    $addpostcom->comment_id = Session::get('post_id');
    $save=$addpostcom->save();
	
    if($save){
        return back()->with('success','Commented successfully');
    }else{
        return back()->with('fail','Something got wrong');
    }
}
}
