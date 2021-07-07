<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Search-iDiscuss</title>
    <style>
    .custombg {
        background-color: rgba(148, 143, 143, 0.37);
        min-height: 55vh;
    }
    </style>
</head>

<body class="bg-dark">
    <?php include('partials/header.php');?>


    <?php 
            if($_SERVER['REQUEST_METHOD']=='GET')
            {
                
                $searchquery=$_GET['search'];
                echo '<div class="container p-md-5 text-light">
        <h1 class="display-4 m-4 fst-italic">Search Results for <em>"'.$searchquery.'"</h1>
        <div class="custombg rounded-3 p-4 m-4">';
                //searching in threads
                $sql="SELECT * FROM `threads` WHERE MATCH (thread_title, thread_desc) against ('$searchquery')";
                $request=mysqli_query($conn, $sql);
                //searching in categories
                $sql2="SELECT * FROM `categories` WHERE MATCH (`cat-name`) against ('$searchquery')";
                $request2=mysqli_query($conn, $sql2);

                if($request && $request2)
                {
                    $resultsfound=false;
                    while($rows=mysqli_fetch_assoc($request2))
                    {   $resultsfound=true;
                        $id=$rows['cat-id'];
                        $name=$rows['cat-name'];
                        $desc=$rows['cat-desc'];
                        echo '<div class="col-md-4 mb-4 ms-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img\card-'.$id.'.jpg" class="card-img-top" width="286px" height="180px"alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$name.'</a></h5>
                                <p class="card-text text-dark">'.substr($desc, 0, 57).' ...</p>
                                <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Thread</a>
                            </div>
                        </div>
                    </div>';
                    }
                    while($row=mysqli_fetch_assoc($request))
                    {
                        $resultsfound=true;
                        $threadid=$row['thread_id'];
                        $threadtitle=$row['thread_title'];
                        $threaddesc=$row['thread_desc'];
                        echo '
                        <div class="d-flex my-3">
                            <div class="flex-grow-1 ms-3">
                                <h5 ><a class="text-light" href="threads.php?threadid='.$threadid.'">'.$threadtitle.'</a></h5>
                                '.$threaddesc.'
                            </div>
                        </div>';
                    }
                    if(!$resultsfound)
                    echo '
                    <div class="container ">
                        <h1 class="display-5">No Discussions Found !</h1>
                        </div>';
                }
                else
                echo 'OOPS! Some error occured. Pls try after some time';
            }
        ?>
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