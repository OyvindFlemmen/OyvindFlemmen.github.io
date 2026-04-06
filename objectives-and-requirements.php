<?php
$bg = "../images/objectives_and_requirements.jpg";
include 'includes/header.php';
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Objectives and Requirements</h1>

    <p>
        This section explains the structure of the device and essential functionality. 
    </p>

    <h4>Objectives</h4>

    <div class="ms-3">
        <p> <b>Aim:</b>
            To develop a digital guitar effects pedal.
        </p>

        <p> <b>Purpose:</b>
            The device processes the audio signal from the guitar’s pickups to create effects with adjustable parameters suitable for amplification.
        </p>

        <p> <b>Composition:</b>
            The device comprises a microcontroller unit, an OLED display, rotary encoders, buttons, LEDs, and 6.35mm jack sockets.
        </p>
    </div>

    <h4>Data and Requirements</h4>


    <div>
        <ol>
            <li>
                The total end-to-end latency of the device must be ≤ 5 ms.
                The latency is measured by recording simultaneously at the inputs and outputs on separate audio channels while applying a short impulse signal to the input.
            </li>
            <li>
                The device must sample the input signal and reconstruct the processed signal at a rate of ≥ 44.1 kHz.
            </li>
            <li>
                The resolution of the sampled and reconstructed signal must be ≥ 12 bits.
            </li>
            <li>
                The device must operate from a 9 V DC, centre-negative power supply using a 2.1 mm barrel connector.
            </li>
            <li>
                The device should draw no more than 250 mA under normal operation.
            </li>
            <li>
                Suitable buffer sizes shall be chosen to prevent buffer underruns at the output.
            </li>
            <li>
                The device features overdrive, distortion, fuzz, delay, tremolo, and chorus effects with adjustable parameters.
            </li>
            <li>
                The device supports multi-effect chains, allowing the user to apply different effects in their preferred order.
            </li>
            <li>
                The design must feature a digital noise gate.
            </li>
            <li>
                A switch is used to toggle the device off, routing the input signal directly to the output, and on, routing the input signal through the MCU for processing.
            </li>
            <li>
                Buttons and rotary encoders are used to change effects and their parameters in real-time.
            </li>
            <li>
                The OLED display shows the current configuration of the effects pedal.
            </li>
        </ol>
    </div>

    <h4>Optional Objectives</h4>

    <div>
        <ol>
            <li>
                The device features additional effects such as flanger, vibrato, phaser, and reverb.
            </li>
        </ol>
    </div>
</main>

<?php include 'includes/footer.php'; ?>