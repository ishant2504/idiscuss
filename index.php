<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Home-iDiscuss</title>
</head>

<body class="bg-dark">
    <?php include('partials/header.php');
        
    
    
    ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

<!-- Crousel starts here -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/crousel-1.jpg" class="d-block w-100" width="1350px" height="350px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Computer Science</h5>
                    <p>According to the Bureau of Labor Statistics, the field of computer science is growing much faster than average at 16% growth per year. Computer scientists can work in a wide array of job titles, including: software developer, computer and information systems manager, computer programmer, web developer, and more.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img\crousel-2.jpg" class="d-block w-100" width="1350px" height="350px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Blockchain Market Size Keeps Growing</h5>
                    <p>According to the International Data Corporation (IDC) blockchain spending is expected to grow at a robust pace throughout the 2018-2023 forecast period with a five-year compound annual growth rate (CAGR) of 60.2%. In August, IDC released the “Worldwide Semiannual Blockchain Spending Guide” which indicates that blockchain spending in 2019 is forecast to be $2.7 Bn, an increase of 80% compared to 2018</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img\crousel-3.jpg" class="d-block w-100" width="1350px" height="350px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Aritificial Intelligence</h5>
                    <p>A new methodology has been developed by roboticists that can create an image of your thoughts using an FMRI scanner. The AI is designed to construct an image from your brain and compare it with other pictures, received from volunteers.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<!-- categories section -->
    <div class="container">
        <h3 class="text-center my-4 border border-primary rounded-pill bg-dark text-primary">iDiscuss - Categories</h3>
        <div class="row my-3 d-flex justify-content">
            <!-- fetching data and displaying it -->
            <?php
                $sql='SELECT * FROM `categories`';
                $request=mysqli_query($conn, $sql);
                while($rows=mysqli_fetch_assoc($request))
                {
                    $id=$rows['cat-id'];
                    $name=$rows['cat-name'];
                    $desc=$rows['cat-desc'];
                    echo '<div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="img\card-'.$id.'.jpg" class="card-img-top" width="286px" height="180px"alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$name.'</a></h5>
                            <p class="card-text">'.substr($desc, 0, 57).' ...</p>
                            <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Thread</a>
                        </div>
                    </div>
                </div>';
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