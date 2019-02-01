<!DOCTYPE html>
<html>
<head>
	<title>new test</title>
</head>
<body>
	<!--  --->


<form method="post" action="{{ route('handleStudent',['id'=>$student]) }}">
           <label>NOM</label> <input type="text" name="name" value=""><br>
           <input type="" name="id_classrom" value=""><br>
         
          
            
            

            <input type="submit" name="submit" value="envoyer">

             {{csrf_field()}}
            
          </form>


</body>
</html>