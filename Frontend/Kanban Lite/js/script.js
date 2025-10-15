const newTaskBtn = document.querySelector('#newTaskBtn');
const newTaskModal = document.querySelector('#newTaskModal');
const form = document.querySelector('#newTaskForm');
const taskInputs = document.querySelectorAll('.taskInputs');
const cardBtn = document.querySelectorAll('.cardBtn');
const taskListToDo = document.querySelector('#toDo');
const taskListFavorites = document.querySelector('#favorites');
const taskListWrkingOn = document.querySelector('#wrkingOn');
const taskListDone = document.querySelector('#done');

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
    console.log(data)

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

cardBtn.forEach(btn => {
    btn.addEventListener('mousedown', () => {
        switch (btn.textContent) {
            case 'star':
                console.log('Star button clicked');
                favoriteCard(btn);
                break;
            case 'move_group':
                console.log('Move button clicked');
                moveCard(btn);
                break;
            case 'delete':
                console.log('Delete button clicked');
                deleteCard(btn);
                break;
        }
    });
});

function favoriteCard(btn) {
    let card = btn.closest('.card');

    card.remove();

    taskListFavorites.appendChild(card);
}

function moveCard(btn) {
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    let card = btn.closest('.card');

    dropdownItems.forEach(item => {
        item.addEventListener('click', () => {
            console.log(item.value);
            
            card.remove();
            document.querySelector(`#${item.value}`).appendChild(card);
        });
    })

}

function deleteCard(btn) {
    timeout = setTimeout(() => {
        btn.closest('.card').remove();
    }, 800);
                
    btn.addEventListener('mouseup', () => {
        clearTimeout(timeout);
    });

    btn.addEventListener('mouseleave', () => {
        clearTimeout(timeout);
    });
}

function checkFormValidity(input) {
    console.log(input.value.length);
    
    if (input.value.length < 3 && !input.classList.contains("is-invalid")) {
        input.classList.add("is-invalid");

        return false;
    } else if (input.classList.contains("is-invalid")) {
        input.classList.remove("is-invalid");
    } 
    
    return true;
}

function createNewCard(data) {

    const card = document.createElement('div');
    card.className = 'card mb-3';

    card.innerHTML = `
    <div class="row g-0">
        <div class="">
            <div class="card-body">
                <h5 class="card-title">${data.taskTitle}</h5>
                <p class="card-text">${data.taskDsc}</p>
                <div class="d-flex justify-content-between">
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    <div>
                        <button type="button" class="cardBtn material-symbols-rounded text-warning-emphasis btn pt-0 pb-0 ps-1 pe-1">star</button>
                        <button type="button" class="cardBtn material-symbols-rounded text-info-emphasis btn pt-0 pb-0 ps-1 pe-1">move_group</button>
                        <button type="button" class="cardBtn material-symbols-rounded text-danger-emphasis btn pt-0 pb-0 ps-1 pe-1">delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `;

    taskListToDo.appendChild(card);
    
}