<?php
$bg = "../images/guitar_pedal.jpg";
include 'includes/header.php';
?>

<!-- Main content -->
<main class="col-lg-10 p-4 hero-section" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">What is a Guitar Pedal?</h1>
    <div class="page-text">
        <p>
            A guitar effects pedal is a device that receives an analogue input from the guitar‘s pickups, processes the signal to apply one or more effects, and outputs the modified audio signal.
            Typically, these pedals appear in front of a guitar amplifier in the signal chain, and are activated using footswitches. Multiple guitar pedals may be connected in series,
            allowing musicians to combine effects to create a variety of different sounds. Guitar pedals are mainly distinguished by two different characteristics: whether they are analogue or digital,
            and which audio effects they can produce. See the links below for an explanation of the different types of pedals and effects.
        </p>

    <div>
        <a href="/guitar-pedal/analogue-versus-digital.php" class="btn btn-structure">Analogue Versus Digital Pedals</a>
        <a href="/guitar-pedal/explanation.php" class="btn btn-structure">Explanation of Different Effects</a>
    </div>


    </div>
</main>


<?php include 'includes/footer.php'; ?>