<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Threads-iDiscuss</title>
    <style>
    .custombg {
        background-color: rgba(148, 143, 143, 0.37);
    }
    </style>
</head>

<body class="bg-dark text-light">
    <?php 
        include('partials/header.php');
// collecting category id from url and fetching corresponding data form the db
        $id=$_GET['catid'];
        $sql="SELECT * FROM `categories` WHERE `categories`.`cat-id` = '$id'";
        $request=mysqli_query($conn, $sql);
        while ($row=mysqli_fetch_assoc($request)){
        $catname=$row['cat-name'];
        $catdesc=$row['cat-desc'];
        $catwiki=$row['cat_wiki'];
        }
        ?>

<!-- Welcoming msg -->
    <div class="container p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Welcome to <?php echo $catname; ?> Forum</h1>
            <p class="lead my-3"><?php echo $catdesc ?></p>
            <?php echo '<p class="lead mb-0"><a target="blank" href="'.$catwiki.'" class="text-white fw-bold">Continue reading...</a></p>' ?>
        </div>
    </div>

<!-- Threads container heading -->
    <div class="container p-md-5">
        <div class="d-grid d-md-flex justify-content-between align-items-center">
            <h1 class="display-4 mb-4 fst-italic">Browse Queries</h1>
            <?php 
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
                echo '<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#allownewthread"
                aria-expanded="false" aria-controls="allownewthread">Start Thread / Ask Question</button>';

                else
                echo '<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#denynewthread"
                aria-expanded="false" aria-controls="denynewthread">Start Thread / Ask Question</button>';
            ?>
        </div>

    <!-- Deny New discussion collapse -->
        <div class="collapse" id="denynewthread">
            <div class="container rounded-lg py-3 custombg fs-4">
                Login first to able to post anything !
            </div>
        </div>
    <!-- Allow New discussion collapse -->
        <div class="collapse" id="allownewthread">
            <div class="card card-body bg-dark">
                <form action="partials/newthreadhandler.php" method="POST">
                    <div class="mb-3">
                        <label for="newthreadtitle" class="form-label">Thread Agenda</label>
                        <input required name="newthreadtitle" type="text" class="form-control custombg" id="newthreadtitle" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="newthreaddesc" class="form-label">Elaborate your agenda</label>
                        <textarea required name="newthreaddesc" class="form-control custombg" id="newthreaddesc" rows="3"></textarea required>
                    </div>
                    <input type="hidden" name="catid" id="catid" value="<?php echo $id ?>">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>

    <!-- Adding  the new thread to the database -->
        <?php 
                if(isset($_GET['insertionsuccess']) && $_GET['insertionsuccess']=="true")
                {
                    echo'
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>Your thread has been succesfully added. Wait for the community to respond.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
                    ';
                }
                elseif(isset($_GET['insertionsuccess']) && $_GET['insertionsuccess']=="false")
                echo '
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>Sever Down ! Your thread couldnt be added. Pls try after some time<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                </div>
                ';
        ?>
        
    <!-- displaying all the threads in this container-->
        <div class="container rounded-lg py-3" style="background-color: rgba(148, 143, 143, 0.37)">
            <!-- fetching all the threads from db with the help of a loop -->
            <?php
            $sql="SELECT * FROM `threads` WHERE `thread_cat_id`= $id ORDER BY thread_id DESC ";
            $request=mysqli_query($conn, $sql);
            $querypresent=false;
            while ($row=mysqli_fetch_assoc($request)){
            $querypresent=true;
            $threadid=$row['thread_id'];
            $threadtitle=$row['thread_title'];
            $threaddesc=$row['thread_desc'];
            echo '
            <div class="d-flex my-3">
                <div class="flex-shrink-0">
                    <img src="img\download.png" width="34px" height="34px" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 ><a class="text-light" href="threads.php?threadid='.$threadid.'">'.$threadtitle.'</a></h5>
                    '.$threaddesc.'
                </div>
            </div>';
            }
            if(!$querypresent)
            {
            echo '<div class="jumbotron ">
            <div class="container">
                <h1 class="display-6">No Discussions Found !</h1>';

                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
                echo '<p class="lead">Be the first one to start a discussion in this category. <a data-bs-toggle="collapse" href="#allownewthread" role="button" aria-expanded="false" aria-controls="allownewthread">Start new discussion</a></p>';

                else
                echo '<p class="lead">Be the first one to start a discussion in this category. <a data-bs-toggle="collapse" href="#denynewthread" role="button" aria-expanded="false" aria-controls="denynewthread">Start new discussion</a></p>';

            echo '</div>
        </div>';
            }
        ?>

            <!-- kept this just for reference -->
            <!-- <div class="d-flex my-3">
            <div class="flex-shrink-0">
                <img src="img\download.png" width="34px" height="34px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5>Thread title</h5>
                This is some content from a media component. You can replace this with any content and adjust it as
                needed.
            </div>
        </div> -->
        </div>

    </div>

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