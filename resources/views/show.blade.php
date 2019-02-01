
<table>
 @foreach($cl as $classroom)
    <tr>
 
          <td> <span style="color: green" >students Name:</span> {{$classroom->title}}</td>
        
      
      </tr>

   @endforeach

  </table>        	