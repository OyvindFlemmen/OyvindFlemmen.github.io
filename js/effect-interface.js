const sampleRate = 44100;
const samplePath = "/audio/guitar_sample.wav";
const gainKnob = document.getElementById("gainKnob");
const toneKnob = document.getElementById("toneKnob");
const tremoloFrequencyKnob = document.getElementById("tremoloFrequencyKnob");
const depthKnob = document.getElementById("depthKnob");
const mixKnob = document.getElementById("mixKnob");
const amplitudeKnob = document.getElementById("amplitudeKnob");
const chorusFrequencyKnob = document.getElementById("chorusFrequencyKnob");
const avgdelayKnob = document.getElementById("avgdelayKnob");
const delayKnob = document.getElementById("delayKnob");
const feedbackKnob = document.getElementById("feedbackKnob");

class WavData {
  constructor() {
    this.chunkID = "";
    this.chunkSize = 0;
    this.format = "";

    this.subChunk1ID = "";
    this.subChunk1Size = 0;
    this.audioFormat = 0;
    this.numChannels = 0;
    this.sampleRate = 0;
    this.byteRate = 0;
    this.blockAlign = 0;
    this.bitsPerSample = 0;

    this.subChunk2ID = "";
    this.subChunk2Size = 0;
    this.samples = new Int16Array();
  }

  static readString(view, offset, length) {
    let result = "";
    for (let i = 0; i < length; i++) {
      result += String.fromCharCode(view.getUint8(offset + i));
    }
    return result;
  }

  static writeString(view, offset, str) {
    for (let i = 0; i < str.length; i++) {
      view.setUint8(offset + i, str.charCodeAt(i));
    }
  }

  static fromArrayBuffer(buffer) {
    const wav = new WavData();
    const view = new DataView(buffer);

    wav.chunkID = WavData.readString(view, 0, 4);
    wav.chunkSize = view.getUint32(4, true);
    wav.format = WavData.readString(view, 8, 4);

    wav.subChunk1ID = WavData.readString(view, 12, 4);
    wav.subChunk1Size = view.getUint32(16, true);
    wav.audioFormat = view.getUint16(20, true);
    wav.numChannels = view.getUint16(22, true);
    wav.sampleRate = view.getUint32(24, true);
    wav.byteRate = view.getUint32(28, true);
    wav.blockAlign = view.getUint16(32, true);
    wav.bitsPerSample = view.getUint16(34, true);

    wav.subChunk2ID = WavData.readString(view, 36, 4);
    wav.subChunk2Size = view.getUint32(40, true);

    const sampleCount = wav.subChunk2Size / 2;
    wav.samples = new Int16Array(sampleCount);

    let sampleOffset = 44;
    for (let i = 0; i < sampleCount; i++) {
      wav.samples[i] = view.getInt16(sampleOffset, true);
      sampleOffset += 2;
    }

    return wav;
  }

  toArrayBuffer() {
    const buffer = new ArrayBuffer(44 + this.subChunk2Size);
    const view = new DataView(buffer);

    WavData.writeString(view, 0, this.chunkID);
    view.setUint32(4, this.chunkSize, true);
    WavData.writeString(view, 8, this.format);

    WavData.writeString(view, 12, this.subChunk1ID);
    view.setUint32(16, this.subChunk1Size, true);
    view.setUint16(20, this.audioFormat, true);
    view.setUint16(22, this.numChannels, true);
    view.setUint32(24, this.sampleRate, true);
    view.setUint32(28, this.byteRate, true);
    view.setUint16(32, this.blockAlign, true);
    view.setUint16(34, this.bitsPerSample, true);

    WavData.writeString(view, 36, this.subChunk2ID);
    view.setUint32(40, this.subChunk2Size, true);

    let sampleOffset = 44;
    for (let i = 0; i < this.samples.length; i++) {
      view.setInt16(sampleOffset, this.samples[i], true);
      sampleOffset += 2;
    }

    return buffer;
  }
}

function initializeKnob(knob) {
  const valueId = knob.dataset.valueId;
  const valueDisplay = document.getElementById(valueId);

  const min = Number(knob.dataset.min ?? 0);
  const max = Number(knob.dataset.max ?? 100);
  const step = Number(knob.dataset.step ?? 1);
  let value = Number(knob.dataset.start ?? min);

  let isDragging = false;

  function setKnobRotation(val) {
    const minAngle = -135;
    const maxAngle = 135;
    const percent = (val - min) / (max - min);
    const angle = minAngle + percent * (maxAngle - minAngle);

    knob.style.transform = `rotate(${angle}deg)`;

    if (step < 1) {
      const decimals = (step.toString().split(".")[1] || "").length;
      valueDisplay.textContent = val.toFixed(decimals);
    } else {
      valueDisplay.textContent = Math.round(val);
    }
  }

  knob.addEventListener("mousedown", (e) => {
    e.preventDefault();
    isDragging = true;
    document.body.classList.add("no-select");
  });

  document.addEventListener("mouseup", () => {
    isDragging = false;
    document.body.classList.remove("no-select");
  });

  document.addEventListener("mousemove", (e) => {
    if (!isDragging) return;

    const sensitivity = (max - min) / 200;
    value += e.movementX * sensitivity;
    value = Math.max(min, Math.min(max, value)); //clamp

    setKnobRotation(value);
  });

  setKnobRotation(value);
}

function applyGain(samples) {
  const gain = parseFloat(
    document.getElementById(gainKnob.dataset.valueId).textContent,
  );
  const tone = parseFloat(
    document.getElementById(toneKnob.dataset.valueId).textContent,
  );

  const MAX = 32767;

  for (let i = 0; i < samples.length; i++) {
    let x = (samples[i] * gain) / 32768;

    if (x >= 1) {
      samples[i] = MAX;
    } else if (x <= -1) {
      samples[i] = -MAX;
    } else {
      let y = x - (x * x * x) / 3;
      samples[i] = y * MAX;
    }

    //tone
    if (i != 0) {
      samples[i] = tone * samples[i] + (1 - tone) * samples[i - 1];
    } else {
      samples[i] = tone * samples[i];
    }
  }
}

function applyTremolo(samples) {
  const depth = parseFloat(
    document.getElementById(depthKnob.dataset.valueId).textContent,
  );
  const frequency = parseFloat(
    document.getElementById(tremoloFrequencyKnob.dataset.valueId).textContent,
  );
  const amplitude = depth * 0.5;

  console.log(depth);
  console.log(frequency);

  for (let i = 0; i < samples.length; i++) {
    let wave = Math.sin((2 * Math.PI * frequency * i) / sampleRate);
    samples[i] = Math.floor((amplitude * wave + 1 - amplitude) * samples[i]);
  }
}

function applyChorus(samples) {
  const mix = parseFloat(
    document.getElementById(mixKnob.dataset.valueId).textContent,
  );
  const amplitude = parseFloat(
    document.getElementById(amplitudeKnob.dataset.valueId).textContent,
  );
  const frequency = parseFloat(
    document.getElementById(chorusFrequencyKnob.dataset.valueId).textContent,
  );
  const avgdelay = parseFloat(
    document.getElementById(avgdelayKnob.dataset.valueId).textContent,
  );

  const d0 = (avgdelay / 1000) * sampleRate;
  const a = (amplitude / 1000) * sampleRate;
  const w = 2 * Math.PI * frequency;

  let output = new Int16Array(samples);

  for (let i = 0; i < samples.length; i++) {
    const dn = d0 + a * Math.sin((w * i) / sampleRate);

    const sample0 = Math.floor(dn);
    const sample1 = sample0 + 1;
    const frac = dn - sample0;

    if (i - sample1 < 0) {
      //DN sample does not exist
      output[i] = samples[i];
      continue;
    } else {
      const interpSample =
        (1 - frac) * samples[i - sample0] + frac * samples[i - sample1];
      let buffer = (1 - mix) * samples[i] + mix * interpSample;

      if (buffer < -32767) {
        buffer = -32767;
      }
      if (buffer > 32767) {
        buffer = 32767;
      }

      output[i] = buffer;
    }
  }

  return output;
}

function applyDelay(samples) {
  const delay = parseFloat(
    document.getElementById(delayKnob.dataset.valueId).textContent,
  );
  const feedback = parseFloat(
    document.getElementById(feedbackKnob.dataset.valueId).textContent,
  );

  const d = Math.floor((delay / 1000) * sampleRate);

  for (let i = 0; i < samples.length; i++) {
    if (i - d < 0) continue; //sample does not exist

    let buffer = feedback * samples[i - d];
    if (buffer < -32767) {
      buffer = -32767;
    }
    if (buffer > 32767) {
      buffer = 32767;
    }

    samples[i] += buffer;
  }
}

async function GenerateAudio() {
  //Check which effects are currently active
  const gainEnabled = document.getElementById("gainSwitch").checked;
  const tremoloEnabled = document.getElementById("tremoloSwitch").checked;
  const chorusEnabled = document.getElementById("chorusSwitch").checked;
  const delayEnabled = document.getElementById("delaySwitch").checked;

  //Retrieve samples
  const file = await fetch(samplePath);
  const buffer = await file.arrayBuffer();
  const data = WavData.fromArrayBuffer(buffer);

  //Modify samples
  if (gainEnabled) {
    applyGain(data.samples);
  }

  if (tremoloEnabled) {
    applyTremolo(data.samples);
  }

  if (chorusEnabled) {
    data.samples = applyChorus(data.samples);
  }

  if (delayEnabled) {
    applyDelay(data.samples);
  }

  //Set the audio player to use the new samples
  const outputBuffer = data.toArrayBuffer();
  const blob = new Blob([outputBuffer], { type: "audio/wav" });
  const url = URL.createObjectURL(blob);

  const audioPlayer = document.getElementById("demoPlayer");
  audioPlayer.src = url;
  audioPlayer.load();

}

document
  .getElementById("generateButton")
  .addEventListener("click", GenerateAudio);
document.querySelectorAll(".knob").forEach(initializeKnob);
