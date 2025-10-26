const KEY = 'todo.items';
export function load(){
    try {
        const raw = localStorage.getItem(KEY);
        if(!raw){
            return [];
        }
        const data = JSON.parse(raw);
        return !Array.isArray(data) ? [] : data;
    }catch (error){
        console.warn('[storage.load] Hiba, üres tömbbel folytatodik a müvelet végzés: ', error)
        return [];
    }
}

export function save(todos){
    try{
        localStorage.setItem(KEY, JSON.stringify(todos));
    }catch (error){
        console.warn('[storage.save] Mentési hiba. Az alkalmazás tovább fut.', error)
    }
}