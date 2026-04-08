<?php
$bg = "../images/comparison_of_similar_devices.jpg";
include 'includes/header.php';
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Comparison of Similar Devices</h1>
    <p>
        In this section, a comparison is made between existing digital guitar effects pedal solutions and this project.
        Key factors for comparison include the components used, latency, sampling/reconstruction rate and resolution,
        and whether or not the system features a noise gate or bypass path when the pedal is turned off. An overview of the comparison is presented in the table below.
    </p>

    <h4><a class="nav-link" href="https://digitalcommons.calpoly.edu/eesp/655"> Multi-Effect Guitar Pedal by Ryan Madden</a></h4>
    <div class="d-flex gap-5 align-items-center mb-2">

        <div>

            <p>
                This device uses a hybrid design, including both analogue and digital effects. It features analogue overdrive, distortion, compressor, chorus, and phasor effects
                which may be chained in any order. The work mentions digital effects, but their actual implementations are not specified. However, delay and reverb effects are mentioned as examples.
                Although analogue effects circuits often provide better overall characteristics, particularly with regards to latency and nonlinear behaviour,
                they also increase the circuit complexity and may come at an increased manufacturing cost; in this design, 4:1 analogue multiplexers alone make up nearly one
                third of the total component cost.
            </p>
            <p>
                The digital circuitry uses a <a class="link-light" href="https://www.st.com/en/microcontrollers-microprocessors/stm32f732ze.html">STM32F732ZET6</a> MCU for the user interface, 
                digital effects processing, and to control the analogue signal chain.
                A rotary encoder is used to change the resistance of digital potentiometers that control the parameters of the analogue effects.
                The device uses a <a class="link-light" href="https://www.ti.com/product/TLV320AIC23B">TLV320AIC23B</a> codec at 16-bit resolution for analogue to digital and digital to analogue conversion.
            </p>
            <p>
                The end-to-end latency is not specified; however, an approximation can be made based on the buffer size and sampling rate,
                specified as 128 and 48 kHz respectively. This buffer is effectively split in two; one half is being filled with values from the ADC and processed,
                while the other half is feeding the DAC. Assuming a negligible codec communication and analogue circuit latency,
                this gives a very respectable latency of approximately 1,3 ms.
            </p>
        </div>
        <a href="images/madden_pedal.png">
            <img src="images/madden_pedal.png" class="device-image">
        </a>
    </div>

    <h4><a class="nav-link" href="https://101-things.readthedocs.io/en/latest/guitar_effects.html "> 101 Things - DIY Multi-Effect Guitar Unit </a></h4>
    <div class="d-flex gap-5 align-items-center mb-2">

        <div>

            <p>
                This open-source project is designed to be a simple and affordable solution for a multi-effects digital guitar pedal.
                It features a wide array of effects, including multiple distortion effects, time-based effects such as delay and reverb,
                and modulation effects such as chorus and flanger. The system also supports multi-effect chains, allowing multiple effects to be used simultaneously.
            </p>
            <p>
                A <a class="link-light" href="https://www.raspberrypi.com/products/raspberry-pi-pico/">Raspberry Pi Pico</a> is responsible for the effects processing and producing the audio output.
                It uses the 12-bit integrated ADC and DAC instead of an external codec for audio sampling and signal reconstruction,
                which trades detail and dynamic range for simplicity. The input is sampled at 320 kHz to minimize the impact of aliasing,
                and a total of 16 input samples is collected before they are processed and added to the output buffer. When the buffer is full,
                the output is then reconstructed at 20 kHz using PWM. This is not ideal for the preservation of audio quality, but is still functional and provides
                acceptable results for audio reproduction. It is then filtered through a first order low-pass filter to remove switching artifacts.
                The system does not separate the analogue and digital parts of the circuit, which can lead to reduced audio quality due to digital noise coupling into the audio path.
                The device does not provide a bypass path or a noise gate for filtering ambient sound when the instrument is not being played.
            </p>
            <p>
                The end-to-end latency is not explicitly stated but can be estimated from analysing the source code.
                The system switches between two output buffers with a capacity of 64 samples each, and each buffer is only sent to the output once full.
                At 20 kHz, this gives an approximate latency of 3,2 ms, assuming negligible analogue latency
            </p>
        </div>
        <a href="images/diy101_pedal.jpg">
            <img src="images/diy101_pedal.jpg" class="device-image">
        </a>
    </div>


    <h4><a class="nav-link" href="https://www.doria.fi/handle/10024/188843"> Low-Latency Digital Guitar Effects Using Signal Processing with Python in Real Time </a></h4>
    <p>
        This implementation stands out as it is not designed as a standalone device, but rather as software running on a computer.
        An external audio interface is responsible for handling the analogue to digital and digital to analogue conversion,
        while the signal processing is performed by a script on the computer. The key benefit to this approach is its reproducibility,
        as the system can be set up on virtually any computer with a compatible audio interface. As a consequence,
        the performance of the system also relies on the specific components used.
    </p>
    <p>
        For the purposes of this comparison, the performance of the system is based on the results reported in the original paper,
        in which a <a class="link-light" href="https://focusrite.com/products/scarlett-2i2-3rd-gen">Focusrite Scarlett 2i2</a> audio interface and an <a class="link-light" href="https://www.amd.com/en/products/processors/desktops/ryzen/7000-series/amd-ryzen-7-7800x3d.html">AMD Ryzen 7 7800X3D</a> CPU are the main performance-determining components.
        The 3rd generation <a class="link-light" href="https://focusrite.com/products/scarlett-2i2-3rd-gen">Focusrite Scarlett 2i2</a> offers a very high ADC resolution of 24 bits and a sampling rate of up to 192 kHz, leading to excellent audio quality.
        A computer typically also offers much greater processing power than an MCU, allowing for more complex digital signal processing algorithms.
        However, there are also disadvantages to this approach. Because of the required hardware, the system is considerably less portable,
        and more cumbersome to use in professional contexts, such as live performances.
    </p>
    <p>
        Another important factor is system latency. This method introduces significantly higher latency than the theoretical best-case scenario of a standalone device at the same
        sample rate and buffer size. This project features three different effects: overdrive, reverberation/echo, and harmoniser.
        The overdrive and reverberation/echo effects were achievable with a sample rate of 96 kHz and a buffer size of 128,
        while the harmoniser effect required a buffer size of 512. This gave the system round-trip latencies of approximately 6,4-6,8 ms, and 26,35 ms,
        respectively. However, it should be noted that all latency values are merely estimations, as the real system round-trip latency was never measured.
        Since tests were performed on a high-end CPU, a larger buffer size, and thus also a higher latency, may be required to accommodate lower-end hardware
    </p>
    <p>
        The full source code of the project is not available, and it is therefore unclear whether a noise gate is implemented.
        As there is no mention of such functionality, for the sake of comparison, it is assumed that no noise gate is present.
        There is also no mention of multi-effect chains, however, the audio-visual demonstration displayed below shows that the system is capable of combining multiple effects in
        sequence.
    </p>
    <iframe width="700" height="300" class="mb-3" src="https://www.youtube.com/embed/wLSomkoesTo"></iframe>

    <h4><a class="nav-link" href="https://digitalcommons.calpoly.edu/eesp/434/"> Digital Guitar Effects Pedal by Ian Lang </a></h4>
    <div class="d-flex gap-5 align-items-center mb-2">
        <div>
            <p>
                Designed as a multi-purpose pedal, the system provides a guitar tuner, looper, and tap tempo functionalities, in addition to multiple digital guitar effects.
                The set of effects include distortion, delay, echo, vibrato, flanger, and chorus. The device also implements a true-bypass signal path.
                However, it does not implement a noise gate in the firmware or hardware.
            </p>
            <p>
                Similar to the multi-effects pedal by Ryan Madden, this pedal uses an STM-family microcontroller. In this project, an <a class="link-light" href="https://www.st.com/en/microcontrollers-microprocessors/stm32f446rc.html">STM32F446RC</a> 
                microcontroller was chosen, a comparatively low-cost alternative in STM’s high-performance series. Instead of using a dedicated codec or relying on the built-in MCU ADC/DAC,
                it employs separate ADC and DAC devices. These consist of an <a class="link-light" href="https://www.ti.com/product/ADS8319">ADS8319</a> 
                16-bit SAR ADC and a <a class="link-light" href="https://www.ti.com/product/DAC8551">DAC8551</a> 16-bit ultralow-glitch DAC, 
                which communicate with the MCU over SPI. The sample and reconstruction rate of the analogue signals is 44.1 kHz
            </p>
            <p>
                Interestingly, the firmware does not employ traditional ADC sample buffering as seen in the previous examples.
                The system uses an 88.2 kB circular buffer, but it is primarily used to store samples for the delay and echo effects and does not provide the MCU with additional
                headroom for performing DSP. A single sample is received, processed, and sent to the DAC before the next sample arrives
            </p>
            <p>
                This gives a much lower device latency, and although it is not explicitly measured, it can reasonably be assumed to be less than 1 ms.
                However, this leaves very little time for the MCU to process each sample; small fluctuations in the execution time,
                such as interrupt handling or any additional processing might cause the MCU to miss the deadline and produce audible artefacts. Therefore, s
                implified DSP algorithms were necessary to ensure that each sample was processed within the available timeslot. While the device supports multi-effects chains in theory,
                the limited processing headroom means that in practice, the results are inconsistent
            </p>
        </div>
        <a href="images/lang_pedal.png">
            <img src="images/lang_pedal.png" class="device-image">
        </a>
    </div>
    

        <table class="comparison-table">
            <tr>
                <th>Name of Project/Product</th>
                <th>MCU</th>
                <th>Audio codec (ADC/DAC)</th>
                <th>Number of effects</th>
                <th>Multi-effects chain</th>
                <th>Sampling/Reconstruction rate</th>
                <th>Buffer size</th>
                <th>ADC/DAC Resolution</th>
                <th>Noise Gate</th>
                <th>Bypass path</th>
                <th>Latency</th>
            </tr>
            <tr>
                <td>Madden</td>
                <td><a class="link-light" href="https://www.st.com/en/microcontrollers-microprocessors/stm32f732ze.html">STM32F732ZET6</a></td>
                <td><a class="link-light" href="https://www.ti.com/product/TLV320AIC23B">TLV320AIC23B</a></td>
                <td>5+</td>
                <td>Yes</td>
                <td>48 kHz</td>
                <td>128</td>
                <td>16-bit </td>
                <td>Yes</td>
                <td>Yes</td>
                <td>1,3 ms</td>
            </tr>
            <tr>
                <td>Dawson (101-Things)</td>
                <td><a class="link-light" href="https://www.raspberrypi.com/products/raspberry-pi-pico/">Raspberry Pi Pico</a></td>
                <td>Internal ADC/DAC</td>
                <td>10</td>
                <td>Yes</td>
                <td>320 kHz/20 kHz</td>
                <td>64</td>
                <td>12-bit </td>
                <td>No</td>
                <td>No</td>
                <td>3,2 ms</td>
            </tr>
            <tr>
                <td>Åberg</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>3</td>
                <td>Yes</td>
                <td>96 kHz</td>
                <td>512</td>
                <td>24-bit</td>
                <td>No</td>
                <td>N/A</td>
                <td>26,35 ms</td>
            </tr>
            <tr>
                <td>Lang</td>
                <td><a class="link-light" href="https://www.st.com/en/microcontrollers-microprocessors/stm32f446rc.html">STM32F446RC</a> </td>
                <td><a class="link-light" href="https://www.ti.com/product/ADS8319">ADS8319</a>, <a class="link-light" href="https://www.ti.com/product/DAC8551">DAC8551</a></td>
                <td>6</td>
                <td>Yes</td>
                <td>44.1 kHz</td>
                <td>1</td>
                <td>16-bit</td>
                <td>No</td>
                <td>Yes</td>
                <td>&lt; 1 ms</td>
            </tr>
            <tr>
                <td>Thesis</td>
                <td><a class="link-light" href="https://www.st.com/en/microcontrollers-microprocessors/stm32h743-753.html">STM32H743</a></td>
                <td>Internal ADC, <a class="link-light" href="https://www.ti.com/product/DAC8830">DAC8830</a></td>
                <td>6+</td>
                <td>Yes</td>
                <td>96 kHz</td>
                <td>128</td>
                <td>16-bit</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>1,3 ms</td>
            </tr>
        </table>


</main>

<?php include 'includes/footer.php'; ?>