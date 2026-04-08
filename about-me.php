<?php 
$bg = "../images/about_me.jpg";
include 'includes/header.php'; 
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    
    <div class="d-flex gap-5 align-items-center mb-2">
        <div>
        <h1>About Me</h1>
        <p>
            I'm a 4th year computer engineering student currently in the process of making a digital guitar pedal for my
            bachelor's project (hence this site's existence). 
        </p>

        <p>
            Currently also working as a Test Engineer at Unity Technologies
        </p>

        <p>
            Hobbies include: cooking, playing guitar, and showing a bunch of 12 year-olds who's boss at 
            Skypark in Ogmios Miestas
        </p>
    </div>
    <div>
        <img src="images/me.jpg" class="me-image">
    </div>
</div>
<p>Could have some links to LinkedIn, YouTube, etc (with pretty colors and a logo)</p>
</main>

<?php include 'includes/footer.php'; ?>