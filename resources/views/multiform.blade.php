<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/multi-form.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/multi-form.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#myForm").multiStepForm(
			{
				// defaultStep:0,
				callback : function(){
					console.log("save");
				}
			}
			).navigateTo(0);
		});
	</script>
</head>
<body>
<form id="myForm" action="{{url('/product')}}" method="POST">
    @csrf
    <h1>Register:</h1>
	  <!-- One "tab" for each step in the form: -->
	  <div class="tab">Name:
	    <p><input placeholder="First name..." name="fname"></p>
	    <p><input placeholder="Last name..." name="lname"></p>
	  </div>
	  <div class="tab">Contact Info:
	    <p><input placeholder="E-mail..." name="email"></p>
	    <p><input placeholder="Phone..." name="phone"></p>
	  </div>
	  <div class="tab">Birthday:
	    <p><input placeholder="dd" name="dd"></p>
	    <p><input placeholder="mm" name="nn"></p>
	    <p><input placeholder="yyyy" name="yyyy"></p>
	  </div>
	  <div class="tab">Login Info:
	    <p><input placeholder="Username..." name="uname"></p>
	    <p><input placeholder="Password..." name="pword" type="password"></p>
	  </div>
	  <div style="overflow:auto;">
	    <div style="float:right;">
	      	<button type="button" class="previous">Previous</button>
	      	<button type="button" class="next">Next</button>
			<button type="button" class="submit">Save</button>
	    </div>
	  </div>
	  <!-- Circles which indicates the steps of the form: -->
	  <div style="text-align:center;margin-top:40px;">
	    <span class="step"><h3>PERSONAL</h3></span>
	    <span class="step"><h3>CONTACT</h3></span>
	    <span class="step"><h3>ADDRESS</h3></span>
	    <span class="step"><h3>FINISH</h3></span>
	  </div>
	</form>
</body>
</html>
