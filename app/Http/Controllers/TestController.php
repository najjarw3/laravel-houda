<?php

namespace Test\Http\Controllers;
use Test\User;
use Test\Classroom;
use Test\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class TestController extends Controller
{
    public function showTest($id=0){

     $cl = Classroom::with('students')->get();
     $cl1 = Classroom::where('status','=',0)->first();
     
   // dd($cl);


     return view('welcome',['academy'=>$id, 'cl'=>$cl, 'cl1'=>$cl1]);
    }


   public function handleTest(){
      
     
     $data = Input:: all();

      $rules = [
           'nom' => 'required',
          'des' => 'required | min:10',
      ];

      $messages = [
          'nom.required' => 'Le nom est obligatoire',
          'des.required' => 'La description est obligatoire',
           'des.min' => 'Il faut taper au moins 10 caréctéres',
      ];

      $validation = Validator::make($data, $rules, $messages);

      if ($validation->fails()) {
          return redirect()->back()->withErrors($validation->errors());
      }

    $photo = str_random(10).'.'.$data['photo']->getClientOriginalExtension();
    $imagePath = public_path('storage/'.$photo);
    //Image::make($data['photo']->getRealPath())->resize(10,10)->save($imagePath);

     //Image::make($data['photo']->getRealPath())->crop(100,100,25,25)->save($imagePath);

     // Image::make($data['photo']->getRealPath())->blur(25)->save($imagePath);
       Image::make($data['photo']->getRealPath())->insert(public_path('vignette.png'))->save($imagePath);

     Classroom::create([
     	'title'=>$data['nom'],
     	'description'=>isset($data['des']) ? $data['des'] : 'Hello',
     	'status'=> 1,
        'photo'=>$photo

     ]);

     //return view('welcome',['academy'=>$data['nom']]);
     return  redirect(route('showTest'));
    }

    public function handleDeleteTest($id){

     $delete = Classroom::find($id);

     $delete->delete();
     return back();
    }



    public function showUpdateTest($id){

     $update = Classroom::find($id);

     

    return view('new', ['resultat'=>$update]);
    
    }


     public function handleUpdateTest($id){

       // $updates = Classroom::find($id);

        $data = Input:: all();

      /*  $updates->title = $data['nom'];
        $updates->description = $data['des'];


        $updates-> save();

        return back();*/

        $cl = Classroom::where('id',"=",$id)->update([  //whereId($id)
              'title'=>$data['nom'],
              'description'=>isset($data['des']) ? $data['des'] : 'Hello',
              'status'=> 1

        ]);
        
        return  redirect(route('showTest'));
      
     
    }


   /* public function showStudents(){

     
    $cl = Classroom::all();
    return view('students',['cl'=>$cl]);
    
    }


    public function handleStudent(){
      
     
     $data = Input:: all();
     Student::create([
        'name'=>$data['name'],
        'classroom_id'=> $data['classrom']
        

     ]);

    return back();
    }*/

    
public function showStudents($id){


     $cl = Classroom::find($id);

     if($cl)
    {
        return view('students',['student'=>$id]);
    }else {
         return  redirect(route('showTest'))->with('error','class inconnu');

    }
    
    }

     public function handleStudent($id){
      
     
     $data = Input:: all();
     Student::create([
        'name'=>$data['name'],
        'classroom_id'=>$id
        

     ]);

    return back();
   

}


    public function showStudent(){

    $students= Student::all();
    return view('welcome',['students'=>$students]);

    }



      public function showUser(){

   

     return view('user');
    }



    public function handleUser(){
      
     
     $data = Input:: all();

     User::create([
        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>bcrypt($data['password'])

     ]);

     return  redirect(url('login'));
     
    }


    public function showLogin(){

     return view('login');
    }



    public function checkLogin(){

      $data = Input::all();
      $cred = [

        'email' => $data['email'],
        'password' => $data['password']

      ];
      if(Auth::attempt($cred)){

        Auth::user();
        return redirect(url('test'));
     // return back();


      }else{

         return back()->with('error','chech your email and password');
      }
           
    }


    public function handleLogout(){
       Auth::logout();

       return view('login');

    }





}


