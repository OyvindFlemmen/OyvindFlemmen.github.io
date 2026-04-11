<?php
$bg = "../images/index_background.jpg";
include 'includes/header.php';
?>

<!-- Main content -->
<main class="col-lg-10 p-4 hero-section" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Effect Simulator</h1>
    <div class="page-text">
        <div class="container-fluid bg-dark text-light">
            <div class="row h-100 mb-4">

                <div class="border effect-panel">
                    <h5 class="mb-4">Gain</h5>


                    <div class="d-flex justify-content-center gap-5 mb-4">

                        <div class="knob-container text-center">
                            <div class="knob" id="gainKnob" data-value-id="gainValue" data-min="0.5" data-max="100" data-start="50" data-step="1">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Gain</b></div>
                                <div id="gainValue">20</div>
                            </div>
                        </div>

                        <div class="knob-container text-center">
                            <div class="knob" id="toneKnob" data-value-id="toneValue" data-min="0.5" data-max="1" data-start="0.5" data-step="0.01">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Tone</b></div>
                                <div id="toneValue">0.1</div>
                            </div>
                        </div>

                    </div>

                    <label class="led-switch mb-0">
                        <input type="checkbox" class="effect-toggle"> <!--For toggle functionality-->
                        <span class="led"></span> <!--Styled as a circle LED-->
                    </label>
                </div>

                <div class="border effect-panel">
                    <h5>Tremolo</h5>
                    <label class="led-switch mb-0">
                        <input type="checkbox" class="effect-toggle"> <!--For toggle functionality-->
                        <span class="led"></span> <!--Styled as a circle LED-->
                    </label>
                </div>

                <div class="border effect-panel">
                    <h5>Chorus</h5>
                    <label class="led-switch mb-0">
                        <input type="checkbox" class="effect-toggle"> <!--For toggle functionality-->
                        <span class="led"></span> <!--Styled as a circle LED-->
                    </label>
                </div>

                <div class="border effect-panel">
                    <h5>Delay</h5>
                    <label class="led-switch mb-0">
                        <input type="checkbox" class="effect-toggle"> <!--For toggle functionality-->
                        <span class="led"></span> <!--Styled as a circle LED-->
                    </label>
                </div>
            </div>
            <div>
                <p>stuff</p>
            </div>
        </div>
    </div>
</main>

<script src="/js/effect-interface.js"></script>


<?php include 'includes/footer.php'; ?>