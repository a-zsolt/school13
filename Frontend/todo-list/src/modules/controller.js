import * as storage from './storage.js';
import * as model from './model.js';
import * as view from './view.js';
import {validateTitle} from "./validator.js";

export function initApp(){
    const initial = storage.load();
    view.init(document);
    model.init(initial);

    view.onAdd((title)=>{
        view.clearError();
        const res = validateTitle(title);
        if(!res.ok){
            view.showError(res.error);
            return;
        }
        model.addTodo(res.value);
        const input = document.querySelector('#new-todo-input');
        if(input)input.value = '';
    });
    view.onToggle((id)=>{
        try{
            model.toggleTodo(id);
        }catch (e){
            console.warn(e)
        }
    });
    view.onDelete((id)=>{
        try{
            console.log(id)
            model.deleteTodo(id);
        }catch (e){
            console.warn(e)
        }
    });
    view.onFilterChange(filter=>{
        try{
            model.setFilter(filter);
        }catch (e){
            console.warn(e)
        }
    });
    model.onChange(state=>{
        view.render(model.getVisibleTodos(), state.filter);
    })
}