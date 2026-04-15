<?php
$bg = "../images/index_background.jpg";
include 'includes/header.php';
?>

<!-- Main content -->
<main class="col-lg-10 p-4 hero-section" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Effect Simulator</h1>
    <div class="page-text">
        <div class="container-fluid bg-dark text-light pb-4">
            <div class="row h-100 mb-4">

                <div class="col-md-6 effect-panel border">
                    <h5 class="mb-4">Gain</h5>


                    <div class="knob-grid mb-4">

                        <div class="knob-container">
                            <div class="knob" id="gainKnob" data-value-id="gainValue" data-min="0.5" data-max="100" data-start="50" data-step="1">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Gain</b></div>
                                <div id="gainValue">20</div>
                            </div>
                        </div>

                        <div class="knob-container">
                            <div class="knob" id="toneKnob" data-value-id="toneValue" data-min="0" data-max="1" data-start="0.5" data-step="0.01">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Tone</b></div>
                                <div id="toneValue">0.1</div>
                            </div>
                        </div>

                    </div>

                    <label class="led-switch mb-4">
                        <input type="checkbox" id="gainSwitch" class="effect-toggle"> <!--For toggle functionality-->
                        <span class="led"></span> <!--Styled as a circle LED-->
                    </label>
                </div>

                <div class="col-md-6 effect-panel border">
                    <h5 class="mb-4">Tremolo</h5>

                    <div class="knob-grid mb-4">

                        <div class="knob-container">
                            <div class="knob" id="tremoloFrequencyKnob" data-value-id="tremoloFrequencyValue" data-min="0.1" data-max="20" data-start="5" data-step="0.1">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Frequency</b></div>
                                <div id="tremoloFrequencyValue">5</div>
                            </div>
                        </div>

                        <div class="knob-container">
                            <div class="knob" id="depthKnob" data-value-id="depthValue" data-min="0" data-max="1" data-start="0.5" data-step="0.01">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Depth</b></div>
                                <div id="depthValue">0.1</div>
                            </div>
                        </div>

                    </div>

                    <label class="led-switch mb-4">
                        <input type="checkbox" id="tremoloSwitch" class="effect-toggle"> <!--For toggle functionality-->
                        <span class="led"></span> <!--Styled as a circle LED-->
                    </label>
                </div>

                <div class="col-md-6 effect-panel border">
                    <h5 class="mb-4">Chorus</h5>

                    <div class="knob-grid mb-4">

                        <div class="knob-container">
                            <div class="knob" id="mixKnob" data-value-id="mixValue" data-min="0" data-max="1" data-start="0.5" data-step="0.01">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Mix</b></div>
                                <div id="mixValue">0.5</div>
                            </div>
                        </div>

                        <div class="knob-container">
                            <div class="knob" id="amplitudeKnob" data-value-id="amplitudeValue" data-min="0" data-max="10" data-start="3" data-step="0.1">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Amplitude (ms)</b></div>
                                <div id="amplitudeValue">3</div>
                            </div>
                        </div>
                        <div class="knob-container">
                            <div class="knob" id="chorusFrequencyKnob" data-value-id="chorusFrequencyValue" data-min="0.1" data-max="5" data-start="0.5" data-step="0.1">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Frequency</b></div>
                                <div id="chorusFrequencyValue">0.5</div>
                            </div>
                        </div>

                        <div class="knob-container">
                            <div class="knob" id="avgdelayKnob" data-value-id="avgdelayValue" data-min="5" data-max="30" data-start="20" data-step="1">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Avg Delay (ms)</b></div>
                                <div id="avgdelayValue">20</div>
                            </div>
                        </div>
                    </div>


                    <label class="led-switch mb-4">
                        <input type="checkbox" id="chorusSwitch" class="effect-toggle"> <!--For toggle functionality-->
                        <span class="led"></span> <!--Styled as a circle LED-->
                    </label>
                </div>

                <div class="col-md-6 effect-panel border">
                    <h5 class="mb-4">Delay</h5>

                    <div class="knob-grid mb-4">
                        <div class="knob-container">
                            <div class="knob" id="delayKnob" data-value-id="delayValue" data-min="10" data-max="800" data-start="100" data-step="1">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Delay (ms)</b></div>
                                <div id="delayValue">80</div>
                            </div>
                        </div>

                        <div class="knob-container">
                            <div class="knob" id="feedbackKnob" data-value-id="feedbackValue" data-min="0" data-max="1" data-start="0.5" data-step="0.01">
                                <div class="knob-indicator"></div>
                            </div>
                            <div class="mt-2">
                                <div><b>Feedback</b></div>
                                <div id="feedbackValue">0.5</div>
                            </div>
                        </div>
                    </div>

                    <label class="led-switch mb-4">
                        <input type="checkbox" id="delaySwitch" class="effect-toggle"> <!--For toggle functionality-->
                        <span class="led"></span> <!--Styled as a circle LED-->
                    </label>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center justify-content-center gap-3 mb-4">
                <audio id="demoPlayer" src="/audio/guitar_sample.wav" controls></audio>
                <button id="generateButton" type="button" class="btn btn-success">Generate</button>
            </div>

            <h5>Load Preset</h5>
            <div id="presetButtonContainer">
                <button class="btn btn-effect">some text</button>
                <button class="btn btn-effect">some text</button>
                <button class="btn btn-effect">some text</button>
                <button class="btn btn-effect">some text</button>
            </div>

        </div>
    </div>
</main>

<script src="/js/effect-interface.js"></script>


<?php include 'includes/footer.php'; ?>