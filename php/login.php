<?php
$title = "StradlingM - Login Page\n";
$date = "27 October 2025\n";
$file =  "login.php\n";
$desc = "Authentication page for StradlingM website";
include "./includes/header.php"
?>
<form>
    <div class="form-group mb-3">
        <label for="inputId" class="form-label">Student Number</label>
        <input type="text" class="form-control" id="inputId" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
include "./includes/footer.php"
?>