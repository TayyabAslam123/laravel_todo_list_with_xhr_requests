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
<h1 style="color:red;">MY TODO'S LIST</h1>

<div class="jumbotron">
<form action="{{url('todo')}}" method="POST" id="f1">
    @csrf
    <div class="form-group">
    
      <input type="text" class="form-control" placeholder="Enter Your Todo" id="t1" name="name">
    </div>
    <div class="form-group">
   
      <input type="text" class="form-control" placeholder="What Is Current Status " id="t2" name="status">
    </div>
   
    <button type="submit" class="btn btn-primary">ADD NOW</button>
  </form>
</div>

<div id="mylist">
@foreach ($data as $item)
    
<div class="card" id="todo_{{$item->id}}">
 
    <h4><b>TODO: </b>{{$item->name}}</h4>
    <h6><b>STATUS: </b>{{$item->status}}</h6>
    <a href="javascript:void(0)" id="delete-user" data-id="{{$item->id}}" class="btn btn-danger delete-user ">Delete</a>
</div>   
@endforeach
</div>


<!--SCRIPTS-->
<script>


//SUBMIT VIA AJAX
$('#f1').submit(function(e){

e.preventDefault();

var name=$('#t1').val();
var status=$('#t2').val();
var url=$(this).attr('action');


var submit_r=  $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
          //  data: $('form').serialize(),
            data: {
                "_token": "{{ csrf_token() }}",
                name:name ,status:status},
          });

submit_r.done(function(data){

$('#f1').prop('reset')
// let dataa=JSON.parse(data);
alertify.alert('TODO SAVED');
// alertify
//   .alert("This is an alert dialog.", function(){
//     alertify.message('OK');
//   });

$('#mylist').prepend('<div class="card" id="todo_'+data.data.id+'"><h4><b>TODO: </b>'+data.data.name+'</h4> <h6><b>STATUS: </b>'+data.data.status+'</h6>  <a href="javascript:void(0)" id="delete-user" data-id="'+data.data.id+'" class="btn btn-danger delete-user">Delete</a></div>');

// $('#mylist').prepend('<div class="card" id="todo_'+data.id+'"><h4><b>TODO: </b>'+data.name+'</h4><h6><b>STATUS: </b>'+data.status+'</h6><a href="javascript:void(0)" id="delete-user" data-id="+'data.id'+" class="btn btn-danger delete-user">Delete</a></div>');
});

});



   //delete user login
 
   $('body').on('click', '.delete-user', function () {
        var user_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")) {
 
        $.ajax({
            type: "DELETE",
               data: {
                "_token": "{{ csrf_token() }}",
              },
          

            url: "{{ url('todo')}}"+'/'+user_id,
            success: function (data) {
                $("#todo_"+user_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
       }
    });   
  
</script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!--END-->    
</body>
</html>