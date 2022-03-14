<!-- whenever the error will be thrown, this page will be displayed at the place of ugly error -->
<!-- but we have to handle the actually errors, exceptions, the 404 or 500 server errors are menaingless -->
<!-- watch povilas korop exception handling video and docs on handling laravel exceptions and throwing our own excepitons -->


<!-- detault error page -->

<div class="container">

  <h2>404 : page not found</h2>

  <p>php version <span>{{ PHP_VERSION }}</span></p>
  <p>laravel version <span>{{ app()->version()  }}</span></p>

</div>



<!-- tiny stylesheet -->
<style>
	body {
		background-color: aliceblue;
		padding: 20px;
		margin: 20px;
		font-family: "Jetbriains mono", sans-serif;
	}

  .container {
    background-color: palegoldenrod;
    margin: 0 auto;
    text-align: center;
    padding: 10px;
  }

  .container h2 {
    color: red;
  }

</style>


