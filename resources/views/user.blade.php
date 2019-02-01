<!DOCTYPE html>
<html>
<head>
	<title>user inscription</title>
</head>
<body>

	 

       <strong > <a href="#">LogOut</a></strong>
      </nav>

	  <form method="post" action="{{ route('handleUser') }}">
           <label>NOM</label> <input type="text" name="name" value=""><br>
           <label>Mail</label> <input type="text" name="email" value=""><br>
           <label>Password</label> <input type="text" name="password" value=""><br>
            
            <input type="submit" name="submit" value="envoyer">
            {{csrf_field()}}
          </form>

     
</body>
</html>