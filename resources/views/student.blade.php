<!DOCTYPE html>
<html lang="en">
<head>
  <title>XHR REQUESTS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
  
</head>
<body>
<h1 style="color:red;">STUDENTS</h1>

<div class="jumbotron">
<form action="{{url('student')}}" method="POST" id="f1" >
    @csrf
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter Your Todo" id="t1" name="name">
    </div>
    <div class="form-group">
   <input type="text" class="form-control" placeholder="Roll No " id="t2" name="roll_no">
    </div>
  <button type="submit" class="btn btn-primary">ADD NOW</button>
  </form>
</div>

<div id="mylist">
@foreach ($data as $item)
    
<div class="card" id="todo_{{$item->id}}">
 
    <h4><b>NAME: </b>{{$item->name}}</h4>
    <h6><b>ROLL NO: </b>{{$item->roll_no}}</h6>
    <a href="javascript:void(0)" id="delete-user" data-id="{{$item->id}}" class="btn btn-danger delete-user ">Delete</a>
</div>   
@endforeach
</div>


<!--SCRIPTS-->
<script>


//SUBMIT VIA AJAX
$('#f1').submit(function(e){

e.preventDefault();
//data
var name=$('#t1').val();
var roll_no=$('#t2').val();
var url=$(this).attr('action');
//send request
var submit_r=  $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
           data: $('form').serialize(),
          
          });

//success
submit_r.done(function(data){
alertify.success('Your Student Saved');
$('#mylist').prepend('<div class="card" id="todo_'+data.data.id+'"><h4><b>TODO: </b>'+data.data.name+'</h4> <h6><b>STATUS: </b>'+data.data.roll_no+'</h6>  <a href="javascript:void(0)" id="delete-user" data-id="'+data.data.id+'" class="btn btn-danger delete-user">Delete</a></div>');

   });


//fail   
submit_r.fail(function (xhr,status,error){
  
  // console.log(error);
  // console.log(status);
  // console.log(xhr);
   console.log(xhr.responseJSON.content);

alertify.error(xhr.responseJSON.content);
       // alertify.error(error);
      // alertify.error(xhr.responseJSON.content);
        // console.error(
        //     "The following error occurred: "+
        //     textStatus, errorThrown
        // ); 
});

});//








   //delete user login
 
   $('body').on('click', '.delete-user', function () {
        var user_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")) {
 
        $.ajax({
            type: "DELETE",
            url: "{{ url('student')}}"+'/'+user_id,
            data: {
                "_token": "{{ csrf_token() }}",
              },
          

        

            success: function (data) {
                $("#todo_"+user_id).remove();
                alertify.success('Student Deleted');
            },
            error: function (data,textStatus,xhr) {
              alertify.error(xhr);
              console.log('Error:', data);
              console.log('Error:', textStatus);
                console.log('Error:', xhr);
            }
        });
       }


    });  
  
</script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!--END-->    
</body>
</html>