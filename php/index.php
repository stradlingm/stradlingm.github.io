<?php
$title = "StradlingM - Home Page\n";
$date = "27 October 2025\n";
$file =  "index.php\n";
$desc = "Home page for the Student Grade Portal";
$banner = "Student Grade Portal";
include "./includes/header.php";
?>
<!-- Heading Row-->
<div class="row gx-4 gx-lg-5 align-items-center my-5">
    <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="https://dummyimage.com/900x400/dee2e6/6c757d.jpg" alt="..." /></div>
    <div class="col-lg-5">
        <h1 class="font-weight-light"><?php echo $banner; ?></h1>
        <p>Start here to search for a students grades!!</p>
        <br>
        <!-- Setup a small form for Student ID input -->
        <h2>
            <input type="text" id="studentId">
            <br />
            <input type="button" value="Search" id="btnSearch">
        </h2>
    </div>
</div>
<!-- Call to Action-->
<div class="card text-white bg-secondary my-5 py-4 text-center">
    <div class="card-body">
        <p class="text-white m-0">This section will showcase projects that I create in the near future.</p>
    </div>
</div>
<!-- Content Row-->
<div class="row gx-4 gx-lg-5">
    <div class="col-md-4 mb-5">
        <div class="card h-100">
            <div class="card-body">
                <h2 class="card-title">Incomplete Project</h2>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetFur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
            </div>
            <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
        </div>
    </div>
    <div class="col-md-4 mb-5">
        <div class="card h-100">
            <div class="card-body">
                <h2 class="card-title">Incomplete Project</h2>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
            </div>
            <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
        </div>
    </div>
    <div class="col-md-4 mb-5">
        <div class="card h-100">
            <div class="card-body">
                <h2 class="card-title">Incomplete Project</h2>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
            </div>
            <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";
?>