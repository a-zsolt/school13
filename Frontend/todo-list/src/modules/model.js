import * as storage from './storage.js';

let state = {todos: [], filter: 'all'}
const listeners = new Set();

function uid(prefix = 't') {
    return `${prefix}_${Date.now().toString(36)}_${Math.random().toString(36).slice(2, 8)}`;
}

function emitChange() {
    storage.save(state.todos);
    const snapshot = getState();
    listeners.forEach(fn => {
        try {
            fn(snapshot);
        } catch (error) {
            console.error('onChange listener error', error);
        }
    });
}

export function getState() {
    return {todos: state.todos.map(t => ({...t})), filter: state.filter};
}

export function init(initialTodos = []) {
    state = {todos: Array.isArray(initialTodos) ? [...initialTodos] : [], filter: 'all'};
    emitChange();
}

export function getVisibleTodos() {
    const todos = state.todos;
    switch (state.filter) {
        case 'active':
            return todos.filter(t => !t.done).map(t => ({...t}));
        case 'done':
            return todos.filter(t => t.done).map(t => ({...t}));
        default:
            return todos.map(t => ({...t}));
    }
}

export function addTodo(title) {
    const todo = {id: uid(), title: title, createdAt: new Date()};
    state = {...state, todos: [todo, ...state.todos]};
    emitChange();
    return todo.id;
}

export function toggleTodo(id) {
    let found = false;
    const next = state.todos.map(t => {
        if (t.id === id) {
            found = true;
            return {...t, done: !t.done};
        }
    });
    if(!found) {
        throw new Error('Ismeretlen azonosító');
    }
    state = {...state, todos: next};
    emitChange();
}
export function deleteTodo(id) {
    const lenBefore = state.todos.length;
    const next = state.todos.filter(t => t.id !== id);
    if(next.length === lenBefore) {
        throw new Error('Ismeretlen azonosító');
    }
    state = {...state, todos: next};
    emitChange();
}

export function setFilter(filter) {
    if(!['all','active','done'].includes(filter)) throw new Error('Érvénytelen szűrő')
    if(filter === state.filter) return;
    state ={...state, filter};
    emitChange();
}
export function onChange(listener){
    listeners.add(listener);
    try{
        listener(getState())
    }catch(error){}
    return ()=>{listeners.delete(listener);};
}