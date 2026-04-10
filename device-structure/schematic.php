<?php 
$bg = "../images/device_structure.jpg";
include '../includes/header.php'; 
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Schematic</h1>
    <p>
        The schematic of the device is split into three parts. I decided that the most logical split would be to separate power, the digital components, and the analogue supply chain.
    </p>
    <h4 class="mb-0">Power Schematic</h4>
    <p>Features the 9V power input from a surface mount 2.1mm barrel connector, an LDO regulator, a buck converter, and the MCU's power pins</p>
    <a href="/images/power.png"><image class="large-image mb-4" src="/images/power.png"></image></a>
    <h4 class="mb-0">Digital Schematic</h4>
    <p>Features the microcontroller, its programming interface, external clock, DAC, rotary encoders, and the I2C interface for communicating with the surface
        mount OLED screen.
    </p>
    <a href="/images/digital.png"><image class="large-image mb-4" src="/images/digital.png"></image></a>
    <h4 class="mb-0">Analogue Schematic</h4>
    <p>Features the guitar pickup input connected to the footswitch, and a whole lot of operational amplifiers responsible for biasing, amplifying, and filtering the signal.
    </p>
    <a href="/images/analogue.png"><image class="large-image mb-4" src="/images/analogue.png"></image></a>
</main>

<?php include '../includes/footer.php'; ?>