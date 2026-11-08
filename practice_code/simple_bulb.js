// ---------- Elements ----------
const stage     = document.getElementById("stage");
const statusEl  = document.getElementById("status");
const btnOn     = document.getElementById("btnOn");
const btnOff    = document.getElementById("btnOff");
const btnAuto   = document.getElementById("btnAuto");
const bulbEl    = document.querySelector(".bulb");

const AUTO_OFF_SECONDS = 5;

// ---------- Timer state ----------
// We keep the IDs in variables so any later click can cancel them.
// Only ONE auto-off timer may exist at a time.
let autoOffTimer = null;   // setTimeout ID  (turns the bulb off)
let countdownTimer = null; // setInterval ID (updates the "Turning off in Ns..." text)
let flowerTimer = null;    // setInterval ID (keeps spawning flowers in colorful mode)

// Cancel any pending auto-off and its live countdown.
function clearTimers() {
  clearTimeout(autoOffTimer);
  clearInterval(countdownTimer);
  autoOffTimer = null;
  countdownTimer = null;
}

// ---------- Flowers ----------
const FLOWERS = ["🌸", "🌼", "🌺", "🌷", "🌻", "💮"];

// A full-screen layer that holds all flying flowers
const flowerLayer = document.createElement("div");
flowerLayer.className = "flower-layer";
document.body.appendChild(flowerLayer);

// Create one flower at the bulb and send it in a random direction
function spawnFlower() {
  const rect = bulbEl.getBoundingClientRect();
  const angle = Math.random() * Math.PI * 2;
  const reach = Math.min(window.innerWidth, window.innerHeight) * (0.2 + Math.random() * 0.3);

  const flower = document.createElement("span");
  flower.className = "flower";
  flower.textContent = FLOWERS[Math.floor(Math.random() * FLOWERS.length)];

  // Start from the glass part of the bulb
  flower.style.left = rect.left + rect.width / 2 + "px";
  flower.style.top  = rect.top + rect.height * 0.35 + "px";

  // Direction, spin, size and speed are random for each flower
  flower.style.setProperty("--dx", Math.cos(angle) * reach + "px");
  flower.style.setProperty("--dy", Math.sin(angle) * reach + "px");
  flower.style.setProperty("--spin", Math.random() * 720 - 360 + "deg");
  flower.style.fontSize = 18 + Math.random() * 22 + "px";
  flower.style.animationDuration = 1.6 + Math.random() * 1.2 + "s";

  // Remove the element when its animation ends so the page stays light
  flower.addEventListener("animationend", () => flower.remove());
  flowerLayer.appendChild(flower);
}

// Big burst first, then a steady stream while colorful mode is active
function startFlowers() {
  stopFlowers();                        // never run two spawners at once
  for (let i = 0; i < 16; i++) spawnFlower();
  flowerTimer = setInterval(spawnFlower, 250);
}

// Stop making new flowers (the ones already flying finish their animation)
function stopFlowers() {
  clearInterval(flowerTimer);
  flowerTimer = null;
}

// ---------- UI helpers ----------
function setBulb(isOn) {
  stage.dataset.state = isOn ? "on" : "off";
}

function setColorful(isColorful) {
  stage.classList.toggle("colorful", isColorful);
  if (isColorful) startFlowers();
  else stopFlowers();
}

function setStatus(text) {
  statusEl.textContent = text;
}

// mode: "on" | "off" | "auto"
function highlight(mode) {
  btnOn.classList.toggle("active", mode === "on");
  btnOff.classList.toggle("active", mode === "off");
  btnAuto.classList.toggle("active", mode === "auto");
}

// ---------- Actions ----------
function turnOn() {
  clearTimers();            // ON cancels a running auto-off, so the bulb stays on
  setColorful(false);       // a single click returns to the normal yellow light
  setBulb(true);
  setStatus("Bulb is ON");
  highlight("on");
}

// Double-click on ON: bulb stays on, dances, changes color and splits flowers
function colorfulOn() {
  clearTimers();
  setBulb(true);
  setColorful(true);
  setStatus("Bulb is ON (colorful mode)");
  highlight("on");
}

function turnOff() {
  clearTimers();            // OFF cancels a running auto-off so it can't fire later
  setColorful(false);
  setBulb(false);
  setStatus("Bulb is OFF");
  highlight("off");
}

function autoOff() {
  clearTimers();            // clicking again restarts: clear the old timer first
  setColorful(false);
  setBulb(true);
  highlight("auto");

  let remaining = AUTO_OFF_SECONDS;
  setStatus(`Turning off in ${remaining}s...`);

  // Live countdown text, updated every second
  countdownTimer = setInterval(() => {
    remaining--;
    if (remaining > 0) setStatus(`Turning off in ${remaining}s...`);
  }, 1000);

  // The real switch-off after 5 seconds
  autoOffTimer = setTimeout(turnOff, AUTO_OFF_SECONDS * 1000);
}

// ---------- Events ----------
btnOn.addEventListener("click", turnOn);
btnOn.addEventListener("dblclick", colorfulOn);   // double-click = colorful flower mode
btnOff.addEventListener("click", turnOff);
btnAuto.addEventListener("click", autoOff);

// Start in the OFF state
turnOff();