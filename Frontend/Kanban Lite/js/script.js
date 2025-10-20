const newTaskBtn = document.querySelector('#newTaskBtn');
const newTaskModal = document.querySelector('#newTaskModal');
const form = document.querySelector('#newTaskForm');
const taskInputs = document.querySelectorAll('.taskInputs');
const cardBtn = document.querySelectorAll('.cardBtn');
const taskListToDo = document.querySelector('#toDo');
const taskListFavorites = document.querySelector('#favorites');
const taskListWrkingOn = document.querySelector('#wrkingOn');
const taskListDone = document.querySelector('#done');
const modeSwitchBtn = document.querySelector('#modeSwitchBtn');

defaultColorMode();

newTaskModal.addEventListener('shown.bs.modal', () => {
  form.reset();
  newTaskBtn.focus()

  addEventListener('keydown', (e) => {
    if (e.key === "Escape") {
        const modal = bootstrap.Modal.getInstance(newTaskModal);
        modal.hide();
    }

    if (e.key === "Enter") {
        formSubmit.click();
    }
  })
})

const formSubmit = document.querySelector('#addTaskBtn');

formSubmit.addEventListener('click', (e) => {
    e.preventDefault();
    
    const data = Object.fromEntries(new FormData(form).entries());

    if (data.taskTitle.length < 3 || data.taskDsc.length < 3) {
        return;
    }

    createNewCard(data);
        
    form.reset();
    const modal = bootstrap.Modal.getInstance(newTaskModal);
    modal.hide();
    
})

function debounce(func, delay) {
    let timeout;
    return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
}

const checkFormValidityDebounced = debounce((input) => {
    checkFormValidity(input);
}, 500);

taskInputs.forEach(input => {
    input.addEventListener('input', () => {        
        checkFormValidityDebounced(input);
    });
});


document.addEventListener('mousedown', (e) => {
    if (e.target.classList.contains('cardBtn')) {
        const btn = e.target;
        
        switch (btn.textContent) {
            case 'star':
                favoriteCard(btn);
                break;
            case 'move_group':
                moveCard(btn);
                break;
            case 'delete':
                deleteCard(btn);
                break;
        }
    }
});

modeSwitchBtn.addEventListener('click', () => {
    if (document.body.getAttribute('data-bs-theme') === 'dark') {
            changeModeTo('light');
        } else {
            changeModeTo('dark');
    }
});

/**
 * Moves the closest card from the button to favorites 
 * @param {Element} btn the button that got pressed  
 */
function favoriteCard(btn) {
    let card = btn.closest('.card');
    btn.classList.add('filled');
    btn.setAttribute('aria-pressed', true);

    card.remove();

    taskListFavorites.appendChild(card);

}

/**
 * Moves the closest card from the button to the selected container from the dropdown 
 * @param {Element} btn the button that got pressed  
 */
function moveCard(btn) {
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    let card = btn.closest('.card');
    
    dropdownItems.forEach(item => {
        const newHandler = () => {            
            card.querySelector('.text-warning-emphasis').classList.remove('filled');
            btn.setAttribute('aria-pressed', false);
            card.remove();
            document.querySelector(`#${item.getAttribute('value')}`).appendChild(card);
        };

        if (item._currentHandler) {
            item.removeEventListener('click', item._currentHandler);
        }

        item.addEventListener('click', newHandler);
        item._currentHandler = newHandler;
    });
}

/**
 * After a 800ms mouse down deletes the closest card from the button
 * @param {Element} btn the button that got pressed  
 */
function deleteCard(btn) {
    let card = btn.closest('.card')

    btn.classList.add('deleting');

    timeout = setTimeout(() => {    
        undoDeleteCard(card)
        btn.classList.remove('deleting');
    }, 800);
                
    btn.addEventListener('mouseup', () => {
        clearTimeout(timeout);
        btn.classList.remove('deleting');
    });

    btn.addEventListener('mouseleave', () => {
        clearTimeout(timeout);
        btn.classList.remove('deleting');
    });
}

/**
 * Replaces the card with a temporally undo delete card and gives a 5sec timeframe for the user to cancel deletion
 * @param {Element} card the card that will be deleted if undo isn't pressed
 */
function undoDeleteCard(card) {
    let undoCard = document.createElement('div')
    undoCard.classList = "card mb-1 bg-danger-subtle";
    undoCard.innerHTML = `
        <div class="row g-0">
            <div class="card-body">
                <h5 class="card-title text-danger">${card.querySelector('.card-title').textContent}</h5>
                <div class="d-flex justify-content-between">
                    <p class="card-text"><small class="text-danger-emphasis">Will be deleted in: <span class="timeRemaining">5</span>s</small></p>
                    <div>
                        <button type="button" class="undoBtn deleteBtn material-symbols-rounded text-info-emphasis btn pt-0 pb-0 ps-1 pe-1">undo</button>
                    </div>
                </div>
                <div class="progress" role="progressbar" aria-label="Example 1px high" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="height: 1px">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    `;
    card.after(undoCard)
    card.remove();

    
    let deadLine = Date.now() + 5000;
    
    let intervalId = setInterval(() => {
        const remaining = Math.max(0, deadLine - Date.now());
        
        renderUndoTime(undoCard, deadLine);

        if (remaining <= 0) {
            clearInterval(intervalId);
            undoCard.remove();
            return;
        }
        
    }, 50);

    const undoBtn = undoCard.querySelector('.undoBtn')
    undoBtn.addEventListener('click', () => {
        clearInterval(intervalId);
        undoCard.after(card);
        undoCard.remove();

    });
}

/**
 * Renders the time remaining before the card is deleted
 * @param {Element} card the temporary undo card
 * @param {Date} deadLine the time when the 5 sec's expire
 */
function renderUndoTime(card, deadLine) {
    const remaining = Math.max(0, deadLine - Date.now())
    const remainingSec = Math.round(remaining / 1000)
    
    card.querySelector('.timeRemaining').textContent = remainingSec;    
    card.querySelector('.progress-bar').style.width = `${(remaining / 5000) * 100}%`
}

/**
 * Applies and removes the is-invalid class for the input fields if it doesn't contain at least 3 chars
 * @param {Element} input the field that needs checking
 * @returns 
 */
function checkFormValidity(input) {    
    if (input.value.length < 3 && !input.classList.contains("is-invalid")) {
        input.classList.add("is-invalid");

        return false;
    } else if (input.classList.contains("is-invalid")) {
        input.classList.remove("is-invalid");
    } 
    
    return true;
}

/**
 * Renders a new task card
 * @param {Object} data contains data from input's (taskTitle, taskDsc)
 */
function createNewCard(data) {

    const card = document.createElement('div');
    card.className = 'card mb-1';
        

    card.innerHTML = `
    <div role="region" aria-labelledby="${data.taskTitle}" class="row g-0">
        <div class="card-body">
            <h5 class="card-title">${data.taskTitle}</h5>
            <p class="card-text">${data.taskDsc}</p>
            <div class="d-flex justify-content-between">
                <p class="card-text"><small class="text-body-secondary">Last updated <span class="modifiedMin">3</span> mins ago</small></p>
                <div>
                    <button type="button" aria-label="Favorite button for ${data.taskTitle}" aria-pressed="false" class="cardBtn material-symbols-rounded text-warning-emphasis btn pt-0 pb-0 ps-1 pe-1">star</button>
                    <button type="button" aria-label="Move dropdown for ${data.taskTitle}" class="cardBtn material-symbols-rounded text-info-emphasis btn pt-0 pb-0 ps-1 pe-1" data-bs-toggle="dropdown">move_group</button>
                    <ul class="dropdown-menu">
                        <li><button aria-label="Button to move ${data.taskTitle} to the To Do section" class="dropdown-item btn" value="toDo">To Do</button></li>
                        <li><button aria-label="Button to move ${data.taskTitle} to the Working On section" class="dropdown-item btn" value="wrkingOn">Working On</button></li>
                        <li><button aria-label="Button to move ${data.taskTitle} to the Done section" class="dropdown-item text-success btn" value="done">Done</button></li>
                    </ul>
                    <button type="button" aria-label="Delete button for ${data.taskTitle}" class="cardBtn material-symbols-rounded text-danger-emphasis btn pt-0 pb-0 ps-1 pe-1">delete</button>
                </div>
            </div>
        </div>
    </div>
    `;

    card.querySelector('.modifiedMin').dataset.lastModified = new Date(); //.toISOString()
    taskListToDo.appendChild(card);
    
}

function updateLastModified(){
    const modifiedMins = document.querySelectorAll('.modifiedMin');
    console.log(modifiedMins);
    
    let currentTime = new Date();

    modifiedMins.forEach(modifiedMin => {
        const lastModified = new Date(modifiedMin.dataset.lastModified);
        const diffInMs = currentTime - lastModified;
        const diffInMinutes = Math.floor(diffInMs / 60000);
        if (diffInMinutes < 1) {
            modifiedMin.textContent = '1<';
            
        } else {
            modifiedMin.textContent = diffInMinutes;
        }
    })
}
setInterval(updateLastModified, 30000)


/**
 * Changes the color mode
 * @param {string} mode  
 */
function changeModeTo(mode) {
    const modeIcon = modeSwitchBtn.querySelector('span');

    document.body.setAttribute('data-bs-theme', mode);

    if (mode === 'dark') {
        modeIcon.textContent = 'light_mode';
        modeSwitchBtn.setAttribute('aria-label', 'Switch to light mode');
    } else {
        modeIcon.textContent = 'dark_mode';
        modeSwitchBtn.setAttribute('aria-label', 'Switch to dark mode');
    }
}

/**
 * Apply's the color mode prefered by the client
 */
function defaultColorMode () {
    const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (systemPrefersDark) {
        changeModeTo('dark');
    } else {
        changeModeTo('light');
    }
};


let exampleCardData = {
  "taskTitle": "Card title",
  "taskDsc": "This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer."
};

createNewCard(exampleCardData);
updateLastModified();