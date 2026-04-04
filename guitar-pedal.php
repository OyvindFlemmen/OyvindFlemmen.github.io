<?php
$bg = "../images/guitar_pedal.jpg";
include 'includes/header.php';
?>

<!-- Main content -->
<main class="col-lg-10 p-4" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">What is a Guitar Pedal?</h1>
    <div class="page-text">
        <p>
            A guitar effects pedal is a device that receives an analogue input from the guitar‘s pickups, processes the signal to apply one or more effects, and outputs the modified audio signal.
            Typically, these pedals appear in front of a guitar amplifier in the signal chain, and are activated using footswitches. Multiple guitar pedals may be connected in series,
            allowing musicians to combine effects to create a variety of different sounds.
        </p>

        <p>
            Historically, guitar pedals were mostly designed as fully analogue devices. These are usually built from simple components, providing a high effects quality at a relatively low cost. 
            However, they are also rather rigid in their design. Due to the processing being solely hardware-based, they provide limited control over the effects parameters, 
            and are usually not suited for implementing long or flexible time-based effects such as delay. 
            The limited scope of a typical analogue pedal also means that musicians who wish to experiment with different effects often need to purchase multiple devices, 
            significantly increasing the overall cost.
        </p>

        <p>
            Digital guitar multi-effects pedals therefore offer greater flexibility at a lower relative cost, combining several different effects into a single device, 
            including effects that are impractical to implement in hardware. Additionally, changing the set of effects or the parameters of digitally processed signals is usually a matter of code changes in the firmware, 
            rather than changes to the existing hardware, as with analogue systems. This simplifies the development of a functional prototype, and allows for additional effects customization. 
            However, these devices rely on analogue-to-digital, and digital-to-analogue conversion to process the signal, and thus, 
            the audio quality is limited by the sampling rate and resolution. Processing the effects reliably, especially those that rely on complex mathematical operations, 
            may also introduce considerable latency between the input and output. 
        </p>

    </div>
</main>


<?php include 'includes/footer.php'; ?>