<?php
session_start();

include ('partials/dbconnect.php');
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
<a href="index.php"><img src="img\idiscuss logo.jpg" alt="" class="mx-2 my-0 rounded-circle border border-light" width="35" height="35"></a>
  <a class="navbar-brand" href="index.php">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active-home" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active-about" href="about.php">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Top Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        //displaying top 3 categories 
        $sql="SELECT * from categories where `cat-id` in (SELECT `thread_cat_id` from threads group by thread_cat_id order by COUNT(*) DESC) LIMIT 3";
        $request=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($request))
        {
          echo'
          <li><a class="dropdown-item" href="threadlist.php?catid='.$row["cat-id"].'">'.$row["cat-name"].'</a></li>';
        }
        echo '</ul>
      </li>
      <li class="nav-item">
        <a class="nav-link active-contact" href="contact.php"  aria-disabled="true">Contact / Feedback </a>
      </li>
    </ul>';
    

      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
      echo '
      <div class="text-light fs-5 mx-2 mt-1 dropdown bg-dark navbar-nav">
      <a class="btn btn-primary dropdown-toggle bg-dark mb-1 p-0 border-dark " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><img src="img\download.png" alt="" class="mx-2 my-0"  width="30" height="30">'.$_SESSION['username'].'
      </a>
    
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li><div class="d-flex text-align-center justify-content-center pt-3 pb-1">
        <img src="img\download.png" alt="" class="mx-2 my-0"  width="50" height="50">
        </div><p class="text-center mb-0 px-2">'.$_SESSION['username'].'</p>
        <p class="text-center px-2">'.$_SESSION['usermail'].'</p></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-center fw-bold" href="partials/logouthandler.php">Logout</a></li>
      </ul></div>
      <form class="d-flex" action="search.php" method="GET" >
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>';
      
//       <div class="dropdown">
//   <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><img src="img\download.png" alt="" class="mx-2 my-0"  width="36" height="34">'.$_SESSION['username'].'<button class="btn btn-sm btn-outline-danger mx-2" href="#">Logout</button>
//   </a>

//   <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
//     <li><a class="dropdown-item" href="#">Action</a></li>
//     <li><a class="dropdown-item" href="#">Another action</a></li>
//     <li><a class="dropdown-item" href="#">Something else here</a></li>
//   </ul>
// </div>

      else
      echo'
      <form class="d-flex" action="search.php" method="GET" >
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
      <button class="btn btn-outline-primary ms-2 my-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
      <button class="btn btn-outline-primary mx-2 my-2" data-bs-toggle="modal" data-bs-target="#signupmodal">Sign-up</button>';

      echo'
  </div>
</div>
</nav>';

include('loginmodal.php');
include('signupmodal.php');
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
        echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show my-0" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>Your have successfully created an account. Login to access all functionalities<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>';
elseif(isset($_GET['signuperror']) && $_GET['signuperror']!="false")
{
  $err=$_GET['signuperror'];
  echo ' <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show my-0" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>'.$err.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div> ';
}

// elseif(isset($_GET['loginsuccess']))//not using this becoz if i go back on a page, it keep on showing alert

elseif(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true && isset($_GET['loginsuccess'])&& $_GET['loginsuccess']=="true")
echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</symbol>
<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
</symbol>
<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</symbol>
</svg>
<div class="alert alert-success d-flex align-items-center alert-dismissible fade show my-0" role="alert">
<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
<div>Your have successfully logged in.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>';

elseif(isset($_GET['loginerror']))
{
$err=$_GET['loginerror'];
  echo ' <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show my-0" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>'.$err.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div> ';
}

elseif(isset($_GET['logoutsuccess']) && $_GET['logoutsuccess']=="true")
echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</symbol>
<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
</symbol>
<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</symbol>
</svg>
<div class="alert alert-success d-flex align-items-center alert-dismissible fade show my-0" role="alert">
<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
<div>Successfully Logged out. Login to access all functionalities.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>';

?>