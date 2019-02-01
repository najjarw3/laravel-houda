@extends('layout')
 
      @section('header')
      @include('inc.header',['title'=>"hello".now()])
      @endsection
      @section('content')


    
  

     
    
   
   <p>@lang('test.hi')</p>
   <p>@lang('test.welcome', ['name'=> Auth::user()->name])</p>

   <!--<p>{{trans('test.hi')}}</p>-->

        @if(session('error'))
          {{ session('error') }}
          @endif



          <form method="post" action="{{ route('handleTest') }}" enctype='multipart/form-data'>
           <label>NOM</label> <input type="text" name="nom" value=""><span style="color: red"> {{$errors->first('nom')}}</span><br>
            <label>Description</label> <input type="text" name="des" value=""><br>
              <input type="text" name="status" hidden value=""><br>
              <input type="file" name="photo" ><br><br>
            <input type="submit" name="submit" value="envoyer">
            {{csrf_field()}}
          </form>
    <div class="container">
          @if(isset($cl))
    <table border="1">
      <tr>
        <th>Status</th>
        <th>date</th>
        <th>Nom de la classe</th>
        <th> Action </th>
         <th> Action </th>
        

      </tr>  
          @foreach($cl as $classroom)
          <tr>

         
           <td>
            @if($classroom->status== 1)
           <strong style="color: green"> {{transformStatus($classroom->status)}}</strong>
           @else 
           <strong style="color: red"> {{transformStatus($classroom->status)}}</strong>
           @endif
          </td> 
            <td>{{ transformCreated($classroom->created_at) }}</td>
           

         
          <td>{{ $classroom->title }}

            <ul>
          @foreach($classroom->students as $student)
          <li>
          {{ $student->name}}
          </li>

           @endforeach
          </ul>
         
          </td>
          
           <td><strong><a href="{{ route('handleDeleteTest',['id'=>$classroom->id])}}">delete</a></strong></td>
           <td><strong><a href="{{ route('showUpdateTest',['id'=>$classroom->id])}}">update</a></strong></td>

          </tr>


          


         
   
          
          @endforeach
        </table>
      </div>
          @endif
           @if(isset($cl1))
           <p style="color: red">{{ $cl1->title }}</p>
           <p style="color: red">{{ $cl1->description }}</p>
           <p style="color: red">{{ $cl1->status }}</p>
           @endif


        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   
                   {{ config('app.name')}}
                   {{ config('app.info')}}
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        @endsection



