<?php 
$bg = "../images/device_structure.jpg";
include '../includes/header.php'; 
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Design conclusions</h1>

    <h4>MCU</h4>
    <p>
        An <a class="link-light" href="https://www.st.com/en/microcontrollers-microprocessors/stm32h743-753.html">STM32H743</a> MCU was chosen for this project due to its powerful Arm Cortex-M7 core. This specific model operates at a clock frequency of up to 480 MHz. 
        This enables the system to handle more complex DSP algorithms in a shorter time frame, thus also allowing smaller buffer sizes to reduce the system latency. 
    </p>
    <h4>Sample Rate</h4>
    <p>
        To prevent aliasing of higher order harmonics and lower the filter requirements, a 96 kHz sampling and reconstruction rate was chosen. As a result, 
        an increased number of samples will need to be processed per buffer cycle than if the minimum sample rate of 44,1 kHz was chosen, which in turn gives the MCU a shorter deadline 
        to process each sample. However, the high computational throughput of the <a class="link-light" href="https://www.st.com/en/microcontrollers-microprocessors/stm32h743-753.html">STM32H743</a> 
        makes this trade-off feasible, provided each effect is kept within reasonable DSP complexity. 
        Buffers with a sample size of 128 then strike a balance between latency and processing headroom, ensuring low latency while at the same time providing consistent results. 
        Assuming negligible analogue latency, this equates to an overall latency of approximately 1,3 ms. 
    </p>
    <h4>Maximum delay</h4>
    <p>
        The MCU has a RAM size of 1 MB, which allows storing 16-bit single-channel samples for up to approximately 11,9 seconds at 44,1 kHz sampling rate, 
        or 5,4 seconds at 96 kHz sampling rate. However, the realistic limit will be lower than this due to a portion of the memory being reserved for program data, 
        DMA buffers, and other system resources. Delays beyond a few seconds see little use in practice, as this range already covers a vast range of rhythmically useful effects. 
        This is reflected in the design of typical commercial delay pedals; for instance, pedals such as the <a class="link-light" href="https://www.st.com/en/microcontrollers-microprocessors/stm32h743-753.html">Boss 
        DD-3T Digital Delay</a> and the <a class="link-light" href="https://www.jimdunlop.com/mxr-carbon-copy-analog-delay/"> M169 Carbon Copy Analog Delay</a> offer 
        delay times of up to 800 ms and 600 ms, respectively. Therefore, for this design, a maximum delay of 2 seconds will be implemented. 
        This provides additional headroom for edge-case or experimental applications while preserving a sufficient memory for the system’s other functions. At 96 kHz sampling rate and 16-bit 
        resolution, this corresponds to a buffer size of 375 kB. 
    </p>
    <h4>DAC</h4>
    <p>
        An advantage of the STM32H7 series in comparison to the STM32F7 series is that it features a 16-bit internal SAR ADC, rather than a 12-bit one. Therefore, although the 
        STM32H7 series microcontrollers are generally sold at a higher price point than the STM32F7 series, this is offset by the integrated 16-bit ADC, which eliminates the need for an 
        external converter to achieve a higher resolution. However, the ENOB of the STM32H7 series ADC is somewhat lower than 16-bits, typically around 12,8 in single-ended mode and 13,7 in 
        differential mode. Thus, to achieve a better signal to noise ratio, the analogue signal shall be sampled in differential mode. 
    </p>
    <p>
        A <a class="link-light" href="https://www.ti.com/product/DAC8830">DAC8830</a> will be used in place of the internal DAC of the STM32H7, as the integrated converter only provides a 
        resolution of 12 bits. The <a class="link-light" href="https://www.ti.com/product/DAC8830">DAC8830</a>, based on a resistor string architecture, 
        provides a monotonic, low-glitch 16-bit resolution, making it a suitable choice for audio reproduction. A 3-wire serial interface is used to communicate with the MCU; it is compatible 
        with several standards, including SPI, which will be used for this project. The device specifies a settling time of 10 µs, meaning that it can comfortably handle the minimum 
        reconstruction rate of 44.1 kHz. A sampling rate of 96 kHz corresponds to a sample period of approximately 10,41 µs, thus falling within the specified settling time.  
    </p>
    <h4>Analogue Front End</h4>
    <p>
        Before the analogue signal is sampled, it must be conditioned. This is done in two main steps: first, the signal is AC-coupled and band-limited, and second, 
        the signal is amplified and biased to match the ADC’s input. The AC-coupling ensures that any DC offset present at the input, such as from previous pedals in the signal chain is removed. 
        A low-pass anti-aliasing filter ensures that inaudible high-frequency components are attenuated to prevent them from folding back into the audible band. 
        Since a sampling rate of 96 kHz is used, the requirements for the anti-aliasing filter are relatively relaxed, as the wide gap between the audible band and the Nyquist frequency means 
        that the filter does not require a very steep roll-off. 
    </p>
    <p>
        The ADC expects an input between 0 and 3,3 V, and the signal therefore needs to be amplified and shifted to fit within this range. Because the input is bipolar, a 
        1,65 V DC reference is applied to centre the waveform within the ADC’s input range. Measured guitar signals typically fall within the tens to a few hundred millivolts range. 
        Therefore, the signal is also amplified so that the ADC can capture the signal with greater accuracy. At the output, the signal is converted back to a bipolar waveform by removing the 
        DC bias and shifting its centre back to 0 V. A low-pass reconstruction filter serves to smooth the output waveform and attenuate high-frequency images generated by the DAC. 
    </p>
    <h4>Power</h4>
    <p>
        A 9 V centre-negative power supply with a 2,1 mm barrel connector was chosen to ensure compatibility with standard guitar pedal power supplies. 
        Guitar pedals are often daisy chained or powered from a common supply, often referred to as a power block. Ensuring interoperability with existing pedalboard systems is therefore prioritized,
         despite no parts of the internal system operating directly at 9 V. The system also features reverse polarity protection through a Schottky diode. Although centre-positive connectors 
         are rare for guitar pedal supplies, accidental connections are possible, and the reverse polarity protection included to protect the circuitry in such cases. 
    </p>
    <p>
        This 9 V signal feeds two voltage regulators; an LDO regulator acts as the supply for the analogue parts of the circuit, while a buck regulator feeds the digital parts of the circuit. 
        The two power rails are kept separate to prevent digital switching noise from distorting the analogue signal. An LDO regulator was chosen for the analogue rail because of their 
        low output noise and high power supply rejection ratio, keeping the supply stable and maintaining a low noise floor. The digital circuitry is significantly less sensitive to supply noise. 
        Therefore, a buck regulator was chosen for the digital rail due to their high efficiency, leading to lower overall power dissipation and thus a lower operating temperature. 
    </p>
</main>

<?php include '../includes/footer.php'; ?>