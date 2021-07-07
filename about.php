<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>About Us</title>
    <style>
      .active-about{
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
        background-color: #6e6b6b;
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
        ?>
        <div class="text-center fillspace">
          <main class="contact-form custombg border rounded-3">
                  <img class="mb-4 border rounded-circle" src="img/idiscuss logo.jpg" alt="" width="200" height="200">
                  <h1 class="h3 mb-1 fw-normal fs-1 ">iDiscuss</h1>
                  <div class="container p-2 fs-6">iDiscuss is a discussion forum created to discuss topics related to computer science.
                   At iDiscuss you can ask any number of doubts which can be answered by other helpful people of the community. 
                  If you have got a new realisation regarding any topic or feel like sharing something good then you are most welcomed to do so. </div>
          </main>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <?php include('partials/footer.php'); ?>
  </body>
</html>