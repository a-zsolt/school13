let $root, $form, $input, $error, $list, $empty, $filters;

let addHandler = null;
let toggleHandler = null;
let deleteHandler = null;
let filterHandler = null;

export function init(root = document) {
    $root = root;
    $form = root.querySelector('#new-todo-form');
    $input = root.querySelector('#new-todo-input');
    $error = root.querySelector('#error');
    $list = root.querySelector('#todo-list');
    $empty = root.querySelector('#empty');
    $filters = root.querySelector('#filters');

    if ($form) {
        $form.addEventListener('submit', e => {
            e.preventDefault();
            if (addHandler) addHandler($input.value);
        });
    }
    if($list){
        $list.addEventListener('click', e => {
            const target = e.target;
            if (target.matches('input[type=checkbox][data-id]')) {
                const id = target.getAttribute('data-id');
                if(toggleHandler) toggleHandler(id);
            }
            if(target.matches('button[data-action="delete"][data-id]')) {
                const id = target.getAttribute('data-id');
                if(deleteHandler) deleteHandler(id);
            }
        })
    }

    if($filters){
        $filters.addEventListener('click', e => {
            const btn = e.target.closest('button[data-filter]');
            if(!btn) return;
            const filter = btn.getAttribute('data-filter');
            if(filterHandler) filterHandler(filter);
        })
    }
}

export function render(todos, activeFilter) {
    $list.innerHTML = '';
    if(!todos || todos.length === 0){
        $empty.hidden = false;
    }else {
        $empty.hidden = true;
        const frag = document.createDocumentFragment();
        for (const t of todos) {
            const li = document.createElement('li');
            li.className = "todo-item";
            li.innerHTML =`
            <input type="checkbox" data-id="${t.id}" ${t.done ? "checked" : ""} aria-label="Készre jelölés">
            <div  class="todo-title" ${t.done ? 'done' : ''}>${escapeHtml(t.title)}</div>
            <div class="todo-actions">
                <!--Here, the letter "e" was left out; it was written as "dele" instead of "delete".-->
                <button type="button" data-action="delete" data-id="${t.id}" aria-label="Törlés">Törlés</button>
            </div>
            `
            frag.appendChild(li);
        }
        $list.appendChild(frag);

        if($filters){
            $filters.querySelectorAll('button[data-filter]').forEach(btn => {
                const isActive = btn.getAttribute('data-filter') === activeFilter;
                btn.setAttribute('aria-pressed', String(!!isActive));
            });
        }
    }
}
export function onAdd(handler){addHandler = handler;}
export function onToggle(handler){toggleHandler = handler;}
export function onDelete(handler){deleteHandler = handler;}
export function onFilterChange(handler){filterHandler = handler;}

 export function showError(message){
    if($error){
        $error.textContent = message || '';
    }
 }
 export function clearError(){
    if($error){
        $error.textContent = '';
    }
    if($input){
        $input.setAttribute('aria-invalid', 'false');
    }
 }

// private fn
function escapeHtml(str) {
    return String(str).replace(/[&<>"']/g, s=>({
        '&': '&amp;',
        '<': '&lt',
        ">": '&gt',
        '"': '&quot;',
        "'": '&#39;',
    })[s]);
}