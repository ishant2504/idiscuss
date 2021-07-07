<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Contact Us</title>
    <style>
      .active-contact{
        color:rgb(255, 255, 255) ;
      }
    .contact-form {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .fillspace {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #999494;
        min-height: 88vh;
        margin-bottom: 1px;
    }
    .custombg{
      background-color: rgb(194, 192, 192);
    }
    #contactingreason{
      min-height: 125px;
    }
    </style>
</head>

<body>
    <?php 
        include('partials/header.php');


        //handling the post request of the form
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
          $contactmailid=$_POST['contactmailid'];
          $contactmailid=str_replace("<","&lt;",$contactmailid);
          $contactmailid=str_replace(">","&gt;",$contactmailid);
          $contactingreason=$_POST['contactingreason'];
          $contactingreason=str_replace("<","&lt;",$contactingreason);
          $contactingreason=str_replace(">","&gt;",$contactingreason);
          $username=$_SESSION['username'];
          $userid=$_SESSION['userid'];

          $sql="INSERT INTO `contactus` ( `user_contact`, `user_query`, `user_id`, `dt`) VALUES ('$contactmailid', '$contactingreason', '$userid', current_timestamp());";
          $request=mysqli_query($conn, $sql);

          if($request)
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
        <div>Your concern has been duly noted. We will get back to you on the mail id you have provided in the form<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>';
        else
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
  <div>Sorry we couldnt process your request. Pls try again after some time<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div> ';
        }

      //checking if the user is logged in or not
        if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true)
        {
          echo '<div class="text-center fillspace">
          <main class="contact-form rounded-3">
              <form action="contact.php" method="POST">
                  <img class="mb-4" src="img/idiscuss logo.jpg" alt="" width="72" height="72">
                  <h1 class="h3 mb-4 fw-normal fs-2 fw-bold">Contact-iDiscuss</h1>
  
                  <div class="form-floating mb-2 rounded-3">
                      <input required type="email" name="contactmailid" class="form-control custombg" id="contactmailid" placeholder="name@example.com">
                      <label for="contactmailid">Your Email address here</label>
                  </div>
                  <div class="form-floating mb-2 rounded-3">
                      <textarea required name="contactingreason" class="form-control custombg" id="contactingreason" placeholder="Your concern"></textarea>
                      <label for="contactingreason">Your concern / Your feedback</label>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Submit</button>
              </form>
          </main>
      </div>';
        }
        else
        {
          echo '<div class="text-center fillspace">
          <main class="contact-form">
              <form>
                  <img class="mb-4" src="img/idiscuss logo.jpg" alt="" width="72" height="72">
                  <h1 class="h3 mb-4 fw-normal fs-1">Contact iDiscuss</h1>
  
                  <div class="container custombg py-4 fs-5">You should be logged in to contact iDiscuss</div>
              </form>
          </main>
      </div>';
        }
        ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <?php include('partials/footer.php'); ?>
</body>

</html>