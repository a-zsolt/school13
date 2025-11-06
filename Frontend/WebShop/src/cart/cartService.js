import { updateCartUI } from "../ui/renderCart";

const KEY = 'cart.items';
export function getSavedCart() {
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

export function saveCart(items = []) {
    if(!Array.isArray(items)){
        console.warn('[storage.save] Nem tömb lett megadva a mentéshez: ', items)
        return;
    }

    try {
        const raw = JSON.stringify(items);
        localStorage.setItem(KEY, raw);
    }catch (error){
        console.warn('[storage.save] Hiba a mentés során: ', error)
    }
}

export function addItemToCart(item) {
    if(typeof item !== 'object' || item === null){
        console.warn('[cart.addItem] Nem objektum lett megadva: ', item)
        return;
    }

    if(item.quantity <= 0) return false;

    
    const cartItems = getSavedCart();
    if (cartItems.some(i => i.id === item.id)) {
        changeItemQuantity(item.id, cartItems.find(i => i.id === item.id).quantity + 1);
        return true;
    } else {
        item = { ...item, "quantity": 1 };
        cartItems.push(item);

    }

    updateCartUI(cartItems);
    saveCart(cartItems);
    return true;
}

export function changeItemQuantity(itemId, newQuantity) {
    const cartItems = getSavedCart();
    const itemIndex = cartItems.findIndex(i => i.id === itemId);
    
    cartItems[itemIndex].quantity = newQuantity;

    if (cartItems[itemIndex].quantity <= 0) {
        cartItems.splice(itemIndex, 1);
        updateCartUI(cartItems);
        saveCart(cartItems);
        return true;
    }

    if (cartItems[itemIndex].quantity > cartItems[itemIndex].stock) {
        return false;
    }

    updateCartUI(cartItems);
    saveCart(cartItems);
    return true;
}