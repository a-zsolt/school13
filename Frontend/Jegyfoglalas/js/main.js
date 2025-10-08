//Setting up the ms constants
const INITIAL_MS = 2 * 60 * 1000; // 2perc
const EXTEND_MS = 30 * 1000; // 30s
const TICK_MS = 250; // 1/4 ms
const TOAST_MS = 2.5 * 100; // 2,5s

//Elemek amik a html-be vannak
const timerEl = document.querySelector("#timer")
const statusEl = document.querySelector("#status")
const extendBtn = document.querySelector("#extendBtn")
const cancelBtn = document.querySelector("#cancelBtn")
const toastEl = document.querySelector("#toast")

//Setting up initial variables
let deadLine = Date.now() + INITIAL_MS
let tickTimeoutId = null;
let expireTime = null;
let expire = false;

//Padding only single digit numbers with leading zero
const pad = (n) => n.toString().padStart(2, '0');

/**
 * Returns a string formatted as MM:SS from milliseconds in a string
 * @param {int} ms 
 * @returns 
 */
function mstoMMSS(ms) {
    let sec = Math.max(0, Math.ceil(ms / 1000))
    let min = Math.floor(sec / 60)
    sec = sec % 60;

    return `${pad(min)}:${pad(sec)}`
}


/**
 * Renders the remaining time in the timer element
 */
function render() {
    const remaining = deadLine - Date.now()

    timerEl.textContent = mstoMMSS(remaining);
}

/**
 * Reccursively schedules a tick to update the timer display until expiration
 */
function scheduleTick() {
    tickTimeoutId = setTimeout( () =>{
        render();
        if (!expire) {
            scheduleTick();
        }
    }, TICK_MS)
}

/**
 * Sets the expiration timeout based on the current deadline and current time
 */
function scheduleExpire() {
    const remaining = Math.max(0, deadLine - Date.now())
    expireTimeoutId = setTimeout (onExpire, remaining)
}

/**
 * Handles the state when the timer expires and calls the clear timer and button disabling functions
 * @returns if the timer has already expired
 */
function onExpire() {
    if (expire) {
        return
    } 
    expire = true
    clearTimers()
    statusEl.textContent = "Lejárt az idő. A foglalás felszabadult."
    timerEl.textContent = '00:00'
    disableActions()
}

/**
 * Clears both the tick and expiration timers if they are set
 */
function clearTimers() {
    if (expireTimeoutId) {
        clearTimeout(expireTimeoutId)
        expireTimeoutId = null
    }
    if(tickTimeoutId) {
        clearTimeout(tickTimeoutId)
        tickTimeoutId = null
    }
}

/**
 * Disables the extend and cancel buttons
 */
function disableActions() {
    extendBtn.disabled = true
    cancelBtn.disabled = true
}

/**
 * Extends the deadline by 30 seconds, updates the status text, and re-schedules the expiration timer if it already exists
 * @returns if the timer has already expired
 */
function onExtend() {
    if (expire) {
        return
    }
    deadLine += EXTEND_MS;
    statusEl.textContent = "Hosszabítva +30 mp."

    if (expireTimeoutId) {
        clearTimeout(expireTimeoutId)
        scheduleExpire();
    }
    render()
}

/**
 * Handles the cancelation of the timer and calls the clear timer and button disabling functions
 * @returns if the timer has already expired
 */
function onCancel() {
    if (expire) {
        return
    } 
    expire = true
    clearTimers()
    statusEl.textContent = "A foglalást lemondtad."
    timerEl.textContent = '00:00'
    disableActions()
}

/**
 * Shows the toast notification only once by checking a data attribute on the toast element
 * @returns if the toast has already been shown
 */
function showToastOnce() {
    if (toastEl.dataset.shown === '1') return;
    toastEl.dataset.shown = '1';
    toastEl.classList.add('show')
    setTimeout(() => {
        toastEl.classList.remove('show');
    }, TOAST_MS)
}

//Running the functions connected to button events
extendBtn.addEventListener('click', onExtend)
cancelBtn.addEventListener('click', onCancel)

//Running the functions connected to keyboard events
document.addEventListener('keydown', (e) => {
    if (e.key.toLocaleLowerCase() === 'e') {
        onExtend()
    }
    if (e.key === 'Escape') {
        onCancel()
    }
})

//Initial render and scheduling
render();
scheduleTick()
scheduleExpire()