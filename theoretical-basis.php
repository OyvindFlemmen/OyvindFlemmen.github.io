<?php
$bg = "../images/theoretical_basis.jpg";
include 'includes/header.php';
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Theoretical basis</h1>

    <h4>Nyquist-Shannon Sampling Theorem</h4>
    <p>The Nyquist-Shannon sampling theorem states that to accurately reconstruct an analogue signal from its digital samples and avoid aliasing,
        the sample rate of the signal must be at least two times the highest frequency component of the analogue signal.
        The typical human hearing range extends from approximately 20 Hz to 20 kHz. A sampling rate of at least 40 kHz would therefore be required to
        reconstruct signals in this range without aliasing. However, a higher sampling rate, also known as oversampling, is often chosen to improve the signal-to-noise ratio,
        reduce the requirements for anti-aliasing filters, and increase the effective resolution of the signal.
        A minimum sampling rate requirement of 44.1 kHz was chosen for this project, because this corresponds with the sampling rate used in CDs.
        However, in practice, a higher sampling rate will be chosen if the system can reliably process the samples in the given timeslot. A high sampling and reconstruction rate is also
        particularly important for non-linear effects such as distortion, due to non-linear effects generating higher order harmonics extending beyond the signal’s original bandwidth.
    </p>

    <h4>Resolution</h4>
    <p>
        The resolution of the sampled signal determines how accurately the amplitude of the sampled signal can be represented.
        The dynamic range of the signal can be approximated by the theoretical signal-to-quantization noise ratio (SQNR) for an ideal N-bit converter shown in the following equation:
    </p>

    <!-- Equation-->
    <p>
        <math display="inline">
            <msub>
                <mtext>DR</mtext>
                <mtext>dB</mtext>
            </msub>
            <mo>=</mo>
            <mn>6.02</mn>
            <mi>N</mi>
            <mo>+</mo>
            <mn>1.76</mn>
        </math>
        dB
    </p>

    <p>
        A resolution of 12 bits, and thus a dynamic range of 74dB was chosen as a minimum for this project, as it is enough to deliver acceptable audio quality.
        However, in the prototype, a 16-bit resolution was chosen to provide an increased dynamic range and meet CD-quality audio standards.
    </p>

    <h4>Latency</h4>
    <p>
        According to Wessel and Wright (2002), digital musical instruments should aim for a latency of no more than 10 ms, and jitter should not exceed 1 ms. 
        A subsequent 2016 study by Jack et al. lends support to this claim, showing that an instrument played with constant 10 ms latency is nearly indistinguishable from zero latency, 
        whereas latencies of both 20 ms and 10 ms with ± 3 ms jitter negatively impacted the perceived quality of the instrument. 
        A maximum delay of 5 ms for this device was therefore chosen, placing it well within the recommended limit. 
        However, the latency should be kept as low as possible to reduce the potential impact of comb filtering. 
        Moreover, this leaves headroom for additional latency introduced by other pedals, amplification, and most notably sound wave propagation through air. 
        For comparison, 5 ms corresponds to the time required by sound waves to propagate a distance of approximately 1,7 m through air at 20˚C. 
    </p>


</main>

<?php include 'includes/footer.php'; ?>