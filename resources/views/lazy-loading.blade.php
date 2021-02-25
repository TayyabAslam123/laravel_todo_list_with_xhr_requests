<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
<script>
$(function() {
    $("img.lazy").lazyload({effect : "fadeIn"});
});
</script>
</head>
<body>
	<div align = "center">
		
		<img class="lazy" data-original="https://unsplash.it/3000/3000/?random" width="640" height="480"><br />
		<img class="lazy" data-original="https://unsplash.it/3000/3000/?random" width="640" height="480"><br />
		<img class="lazy" data-original="https://unsplash.it/3000/3000/?random" width="640" height="480">
        <img class="lazy" data-original="https://unsplash.it/3000/3000/?random" width="640" height="480"><br />
		<img class="lazy" data-original="https://unsplash.it/3000/3000/?random" width="640" height="480"><br />
		<img class="lazy" data-original="https://unsplash.it/3000/3000/?random" width="640" height="480">


	</div>
</body>
</html>