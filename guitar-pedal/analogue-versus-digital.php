<?php
$bg = "../images/guitar_pedal.jpg";
include '../includes/header.php';
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
        <h1 class="page-title">Analogue versus digital</h1>

        <h4>Analogue Pedals</h4>
        <p>
                Historically, guitar pedals were mostly designed as fully analogue devices. These are usually built from simple components, providing a high effects quality at a relatively low cost.
                However, they are also rather rigid in their design. Due to the processing being solely hardware-based, they provide limited control over the effects parameters,
                and are usually not suited for implementing long or flexible time-based effects such as delay.
                The limited scope of a typical analogue pedal also means that musicians who wish to experiment with different effects often need to purchase multiple devices,
                significantly increasing the overall cost.
        </p>

        <div class="row mb-5">

                <div class="col-md-6 d-flex gap-3 align-items-center">
                        <a href="https://www.boss.info/us/products/ds-1/">
                                <img src="/images/ds1.png" class="pedal-image">
                        </a>
                        <div>
                                <h5><a class="link-light" href="https://www.boss.info/us/products/ds-1/">Boss DS-11</a></h5>
                                <p>
                                        The DS-1 Distortion is a true icon in the world of guitar effects. Introduced in 1978, BOSS’s first distortion pedal defined a bold new sound,
                                        delivering hard-edged attack and smooth sustain that’s been a staple of players for generations. The DS-1 is the top-selling BOSS compact pedal ever,
                                        and its original, unchanged design continues to inspire the creation of great music everywhere.
                                </p>
                        </div>
                </div>

                <div class="col-md-6 d-flex gap-3 align-items-center">
                        <a href="https://www.jimdunlop.com/mxr-phase-90/">
                                <img src="/images/mxr_phase_90.png" class="pedal-image">
                        </a>
                        <div>
                                <h5><a class="link-light" href="https://www.jimdunlop.com/mxr-phase-90/">MXR Phase 90</a></h5>
                                <p>
                                        For more than four decades, the MXR Phase 90 has been a mainstay on the pedal boards of millions of players around the globe.
                                        This little orange box went on to become the sole icon of its effect category, and countless legendary riffs have benefitted from the sonic qualities of
                                        this pedal. No matter the genre or instrument, the Phase 90 has been there through it all to add its distinctly lush voice to a musician's tone palette.
                                        With the twist of the Rate knob, you can take the Phase 90's warm modulation from subtle, spatial shimmer to all-out high velocity swooshing.
                                </p>
                        </div>
                </div>
        </div>

        <h4>Digital Pedals</h4>
        <p>
                Digital guitar multi-effects pedals therefore offer greater flexibility at a lower relative cost, combining several different effects into a single device,
                including effects that are impractical to implement in hardware. Additionally, changing the set of effects or the parameters of digitally processed signals is usually a matter of code changes in the firmware,
                rather than changes to the existing hardware, as with analogue systems. This simplifies the development of a functional prototype, and allows for additional effects customization.
                However, these devices rely on analogue-to-digital, and digital-to-analogue conversion to process the signal, and thus,
                the audio quality is limited by the sampling rate and resolution. Processing the effects reliably, especially those that rely on complex mathematical operations,
                may also introduce considerable latency between the input and output.
        </p>


        <div class="row mb-5">
                <div class="col-md-6 d-flex gap-3 align-items-center">

                        <a href="https://line6.com/helix/helix-lt.html">
                                <img src="/images/helix.png" class="pedal-image">
                        </a>
                        <div>
                                <h5><a class="link-light" href="https://line6.com/helix/helix-lt.html">Line 6 Helix</a></h5>
                                <p>
                                        The streamlined Helix® LT boasts the same dual-SHARC® processing and professional-quality HX® Modeling found in the flagship Helix Floor and
                                        Helix Rack amp and effects processors—outperforming all other products in its class. Features include a player-friendly interface with a large color LCD,
                                        capacitive-touch footswitches for easy editing, an onboard expression pedal, analog and digital I/O, and a USB audio interface.
                                </p>
                        </div>
                </div>

                <div class="col-md-6 d-flex gap-3 align-items-center">

                        <a href="https://www.boss.info/us/products/dd-3/">
                                <img src="/images/dd3.png" class="pedal-image">
                        </a>
                        <div>
                                <h5><a class="link-light" href="https://www.boss.info/us/products/dd-3/">Boss DD-3</a></h5>
                                <p>
                                        This compact pedal provides a digital delay effect with outstanding quality equivalent to that of a dedicated rackmount delay unit, all with simple stompbox-style control.
                                        Provides 3 delay time modes and a Delay Time control for quick adjustment of exact delay time between 12.5ms – 800ms.
                                </p>
                        </div>
                </div>
        </div>
</main>

<?php include '../includes/footer.php'; ?>