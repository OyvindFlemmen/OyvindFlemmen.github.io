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

document.querySelectorAll(".knob").forEach(initializeKnob);