 @extends('layouts.app')
@section('content')
<div id="one" class="container">
    @if(!Auth::guest())
    <div class="form">
        <form action="{{route('add_coment')}}" method="POST">
            <div class="form-group">
                            <label for="exampeInputFile">Your Coment</label>
                            <textarea style="resize: none;" name="coment" class="form-control" accesskey="x"></textarea>
                      </div>
            <button id="send" class="btn btn-default" type="submit">Send</button>
            {{csrf_field()}}
        </form>
    </div>
    @endif
    <br>
    <div id="coments">
    @foreach($coments as $coment)
        





 <div class="panel panel-default">
        @if (!Auth::guest())
                                 @if(Auth::user()->id == $coment->user_id)
        <a class="delete_coment" href="coment_delete/{{$coment->id}}"><i class="fa fa-times"></i></a>
        @endif
                                 @endif
             <div class="panel-heading">{{$coment->user->name}}
                </div>


              <div style="word-wrap:break-word;" class="panel-body">{{$coment->coment}}
                         
              </div>
        </div>








    @endforeach
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- ajax for delete coment -->
 <script>
   $(document).ready(function(){


     $('.delete_coment').on('click',function(event){

         var ttt = event.target;
     var div = event.target.parentElement;
     // alert(div);
     var href = $(div).attr('href');
          // alert(ttt.innerText);
     var panel = div.parentElement;
       var container = panel.parentElement;
          
          $.get(href,function(data){
            if (data == 1) {container.removeChild(panel);}
            // alert(77);
         
       });
 event.preventDefault();
     });






 $('#send').on('click',function(event){

        
        var val = $(".form-control").val();

          
          
         
        $.ajax({
          url:'add_coment', 
          type:'POST',
          data:{'coment': val,'_token':"{{csrf_token()}}" },
          success: function(data){
            

                    
var list = document.getElementById('coments');
var i = list.childNodes[0];
var newDiv = document.createElement('div');
newDiv.classList.add("panel");
newDiv.classList.add("panel-default");
list.insertBefore(newDiv, i);



var a = document.createElement('a');
a.className = "delete_coment";
a.href = "coment_delete/"+data[0];
newDiv.appendChild(a);



var tagi = document.createElement('i');
tagi.className = "fa fa-times";
a.appendChild(tagi);


var divka = document.createElement('div');
divka.className = "panel-heading";
divka.innerHTML = data[2];
newDiv.appendChild(divka);

var down = document.createElement('div');
down.className = "panel-body";
down.innerHTML = data[1];
newDiv.appendChild(down);


$(".form-control").val('');
$('#coment').trigger('click');        
          }
        });
 event.preventDefault();

     });


   });
  





   
    
 
   </script>
</div>
    @endsection