@extends('layout')
 
      @section('header')
      @include('inc.header',['title'=>"login".now()])
      @endsection
      @section('content')

	 @if(Auth::user())
       <strong class="name"> Salut {{ Auth::user()->name}}</strong>

       <strong > <a href="{{ route('handleLogout')}}">LogOut</a></strong>

       @else
       
	
	 <form method="post" action="{{route('checkLogin')}}">
           
           <label>Mail</label> <input type="text" name="email" value=""><br>
           <label>Password</label> <input type="text" name="password" value=""><br>
            
            <input type="submit" name="submit" value="envoyer">
            {{csrf_field()}}
          </form>

          @if(session('error'))
         <strong style="color: red"> {{ session('error') }}</strong>
        @endif
        @endif

