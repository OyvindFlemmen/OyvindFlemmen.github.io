<?php 
$bg = "../images/tools_used.jpg";
include 'includes/header.php'; 
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Tools Used</h1>

    <div class="d-flex gap-5 align-items-center mb-5">
        <img src="images/stm32cubeide_logo.png" class="tool-image">
        <p>
            The device uses an STM-family MCU, and thus, the <a class="link-light" href="https://www.st.com/en/development-tools/stm32cubeide.html">STM32CubeIDE</a> 
            will be the primary development environment for this project. This software integrates hardware configuration through <a class="link-light" href="https://www.st.com/en/development-tools/stm32cubemx.html">STM32CubeMX</a>, which allows for easier pin and peripheral configuration. 
            <a class="link-light" href="https://www.st.com/en/development-tools/stm32cubeide.html">STM32CubeIDE</a> also includes tools for firmware deployment and debugging, simplifying the development and testing of the device. 
        </p>
    </div>

    <div class="d-flex gap-5 align-items-center mb-5">
        <img src="images/altium_designer_logo.png" class="tool-image">
        <p>
            <a class="link-light" href="https://www.altium.com/altium-designer">Altium Designer</a> will be used to design the PCB. The extensive component library and automatic design-rule checking reduce the time required for designing custom component 
            footprints and lower the risk of layout errors. The integrated rules checker also ensures that the PCB is compliant with recommended electrical and manufacturing standards. 
            Free alternatives, such as <a class="link-light" href="https://www.kicad.org/">KiCad</a>, were considered; however, <a class="link-light" href="https://www.altium.com/altium-designer">Altium Designer</a> 
            was selected due to its more expansive toolset and component library. 
        </p>
    </div>

    <div class="d-flex gap-5 align-items-center mb-5">
        <img src="images/audacity_logo.png" class="tool-image">
        <p>
            For evaluating the system’s latency, a short impulse signal is captured at the input and output of the device simultaneously on different audio channels through an audio interface 
            into a digital audio workstation (<a class="link-light" href="https://www.audacityteam.org/">Audacity</a>). The difference in the signals’ time of arrival is then compared, where the difference is the total latency.   
        </p>
    </div>

    <div class="d-flex gap-5 align-items-center mb-5">
        <img src="images/oscilloscope_icon.png" class="tool-image">
        <p>
            The output of the device will be analysed using an oscilloscope to verify that the waveforms exhibit the expected behaviour. 
            This includes confirming the correct signal amplitude, proper biasing, and desired clipping characteristics. In addition, 
            the oscilloscope is used to ensure the absence of unwanted signal artefacts.    
        </p>
    </div>

    <div class="d-flex gap-5 align-items-center mb-5">
        <img src="images/guitar_icon.png" class="tool-image">
        <p>
            The primary external equipment used for testing includes an electric guitar in <a class="link-light" href="https://en.wikipedia.org/wiki/C_tuning_(guitar)">C-standard</a> tuning with <a class="link-light" href="https://www.daddario.com/en-eu/products/nyxl1260-nyxl-electric-guitar-strings-nickel-wound-extra-heavy-12-60">heavy gauge strings (12-60)</a> and a dual 
            <a class="link-light" href="https://www.mansonguitarworks.com/pickups">Manson humbucker pickup</a> set, as well as an <a class="link-light" href="https://orangeamps.com/products/crush-35rt">Orange Crush 35RT</a> solid-state guitar amplifier.    
        </p>
    </div>

</main>

<?php include 'includes/footer.php'; ?>