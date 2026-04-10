<?php 
$bg = "../images/guitar_pedal.jpg";
include '../includes/header.php'; 
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Explanation of different effects</h1>
    <p>
        Below, I've listed some of the more common guitar effects that are commonly found in guitar effect pedals. This is by no means an exhaustive list, 
        and is instead meant as a broad overview to introduce the basics. Under the explanation of each effect, I've also included an audio players with examples of what each effect may sound like.
        I did not provide a comprehensive explanation of the effects in my bachelor's thesis documement, so the following explanations are mostly taken from ChatGPT.
    </p>

    <h4>Distortion</h4>
    <p>
        Distortion is perhaps the simplest effect to explain. It alters a guitar signal by clipping the waveform, 
        meaning the peaks of the signal are cut off when they exceed a certain level. This introduces additional harmonic content, making the sound richer, more aggressive, and sustained. 
        Depending on how strongly the signal is clipped, distortion can range from mild overdrive to heavy, saturated tones used in rock and metal.
    </p>
    <div class="d-flex gap-3 align-items-center mb-4">
        <div class="audio-example">
            <h6>Example:</h6>
            <a class="link-light" href="https://www.youtube.com/watch?v=xGYmX7yVqEg/">VILT - Enslaved</a>
        </div>
        <audio controls src="/audio/distortion.mp3"></audio>
    </div>

    <h4>Delay</h4>
    <p>
        A delay effect works by recording the input signal and playing it back after a short time, creating an echo. 
        The delayed signal can be repeated multiple times with decreasing amplitude using feedback, producing a series of echoes. By adjusting the delay time and feedback level, 
        the effect can range from a subtle sense of space to pronounced rhythmic repeats.
    </p>
    <div class="d-flex gap-3 align-items-center mb-4">
        <div class="audio-example">
            <h6>Example:</h6>
            <a class="link-light" href="https://www.youtube.com/watch?v=9erLsEHAZRI">Guns'n Roses - Welcome to the Jungle</a>
        </div>
        <audio controls src="/audio/delay.mp3"></audio>
    </div>


    <h4>Tremolo</h4>
    <p>
        A tremolo effect modulates the amplitude (volume) of the signal over time, causing it to periodically get louder and quieter. 
        This modulation is typically controlled by a low-frequency oscillator (LFO), which determines the rate (speed) and depth (intensity) of the effect. At subtle settings, 
        tremolo adds a gentle pulsing character, while at higher depths and speeds it produces a pronounced, rhythmic chopping sound.
    </p>
    <div class="d-flex gap-3 align-items-center mb-4">
        <div class="audio-example">
            <h6>Example:</h6>
            <a class="link-light" href="https://www.youtube.com/watch?v=qgDrpWWxuto">Nancy Sinatra - Bang Bang</a>
        </div>
        <audio controls src="/audio/tremolo.mp3"></audio>
    </div>

    <h4>Chorus</h4>
    <p>
        A chorus effect works by mixing the original signal with one or more slightly delayed and pitch-modulated copies of itself. 
        These small variations in timing and pitch, typically controlled by a low-frequency oscillator (LFO), create the illusion of multiple instruments playing the same part simultaneously. 
        The result is a thicker, wider, and more spacious sound, often described as “shimmering” or “lush.”
    </p>
    <div class="d-flex gap-3 align-items-center mb-4">
        <div class="audio-example">
            <h6>Example:</h6>
            <a class="link-light" href="https://www.youtube.com/watch?v=LwfMqgpZe5U">Guns N' Roses - Paradise City</a>
        </div>
        <audio controls src="/audio/chorus.mp3"></audio>
    </div>


</main>

<?php include '../includes/footer.php'; ?>