<?php 
$bg = "../images/about_me.jpg";
include 'includes/header.php'; 
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    
    <div class="d-flex gap-5 align-items-center mb-2">
        <div>
        <h1 class="page-title">About Me</h1>
        <p>
            I'm a 4th year computer engineering student currently in the process of making a digital guitar pedal for my
            bachelor's project (hence this site's existence). 
        </p>

        <p>
            Currently also working as a Test Engineer at Unity Technologies, investigating customer bug reports. 
        </p>

        <div class="socials">
            <a href="https://www.linkedin.com/in/%C3%B8yvind-flemmen-4441202b5/"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/OyvindFlemmen"><i class="fab fa-github"></i></a>
            <a href="https://youtube.com/@poslethegoat"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
    <div>
        <img src="images/me.jpg" class="me-image">
    </div>
</div>
</main>

<?php include 'includes/footer.php'; ?>