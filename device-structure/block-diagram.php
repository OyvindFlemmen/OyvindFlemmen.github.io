<?php 
$bg = "../images/device_structure.jpg";
include '../includes/header.php'; 
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Block diagram</h1>
    <p>
        The block diagram shown below illustrates the signal path throughout the processing stages explained in previous sections, 
        as well as the relationships between the system’s main functional blocks. 
    </p>
    <image class="large-image" src="/images/block_diagram.png"></image>
    <p>
        The analogue front-end block comprises the first stage of the signal conditioning, namely AC coupling and anti-alias filtering. The output of this stage is then biased and amplified by the 
        ADC conditioning block. In this block, a 1,65 V reference is derived from the 3,3 V LDO regulator, which in turn is powered by the 9 V supply. 
        Note that the ADC conditioning block does not represent or include the ADC itself, as the ADC is part of the MCU block. 
    </p>
    <p>
        The MCU block is responsible for sampling and processing the conditioned signal. After processing, the output is reconstructed by the DAC. 
        Both the MCU and the DAC are powered by the 3,3 V buck regulator, which is stepped down from the 9 V supply. The reconstruction filter ensures that the output is a smooth, 
        continuous analogue waveform free of high-frequency artefacts. 
    </p>
    <p>
        Rotary encoders, a button, a power switch, and an OLED screen provide controls and visual feedback on the pedal’s current configuration. 
    </p>
</main>

<?php include '../includes/footer.php'; ?>