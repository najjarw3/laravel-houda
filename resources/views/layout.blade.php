<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
 
@yield('header')
</head>
<body>
	  <nav >
	  	<div class="n" style="background-color: black">
        @if(Auth::user())
       <strong  class="name"> Salut {{ Auth::user()->name}}</strong>
        @endif

       <button> <a href="{{ route('handleLogout')}}">LogOut</a></button>
      </nav>

    <br><br>

    @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
          
@yield('content')

</body>
</html>
