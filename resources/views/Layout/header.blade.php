<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('/index') }}">
      <img src="web_images/weblogo.png" alt="Avatar Logo" style="width:50px;" class="rounded-pill"> 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="mynavbar">
      <ul class="navbar-nav ms-auto ">
        <li class="nav-item ">
          <a class="nav-link color" href="{{ route('/homepage') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link color" href="{{ route('/About_page') }}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link color" href="{{ route('/privacy_page') }}">Privacy Police</a>
        </li>
        <li class="nav-item">
          <a class="nav-link color" href="{{ route('/contact_page') }}">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link color" href="{{ route('register') }}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link color" href="{{ route('login') }}">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<style>
  .color{
     color: gold;
  }
</style>

     <style>
            body {
                background-color: #FFC300;
            }
        </style>