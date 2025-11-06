import * as cartService from '../cart/cartService.js';
import * as renderCart from './renderCart.js';
import { formatMoney } from '../utils/money.js';

export function renderProducts(products = []){
    if (products.length === 0) {
        let errorMessage = document.createElement('div')
        errorMessage.className = "d-flex flex-column justify-content-center align-items-center p-5"
        errorMessage.innerHTML = `
            <h3 class="text-muted">Nincs elérhető termék</h3>
            <button class="btn btn-primary mt-3" onclick="location.reload()">Próbáld újra</button>
        `
        document.body.appendChild(errorMessage);
    } else {
        let cardGrid = document.createElement('div')
        cardGrid.classList = "row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5 g-3 p-3"
    
        products.forEach(product => {
            cardGrid.appendChild(productCard(product));
        })
    
        document.body.appendChild(cardGrid);
    }

}

function productCard(product) {
    let card = document.createElement('div')
    card.className = "col"
    card.innerHTML = `
        <div id="${product.id}" class="card shadow-sm" style=" border: none; border-radius: 12px; overflow: hidden;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold mb-2">${product.name}</h5>
                <small>${product.stock <= 0 ? `Készlethiányos`: `Készlet: ${product.stock} db`}</small>
                <div class="mt-auto">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-primary fw-bold">${formatMoney(product.price)}</h4>
                        ${product.stock <= 0 ? 
                            `<button class="btn btn-primary px-4" disabled>Kosárba</button>` : 
                            `<button class="btn btn-primary px-4" 
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Add item to cart and open it">Kosárba</button>`}        
                    </div>
                </div>
            </div>
        </div>

    `

    const button = card.querySelector('button.btn-primary');
    if (button && !button.hasAttribute('disabled')){
        button.addEventListener('click', () => {
            const item = { id: product.id, name: product.name, price: product.price, stock: product.stock };
            const added = cartService.addItemToCart(item);
            if (!added) {
                alert('Nem sikerült hozzáadni a terméket a kosárhoz.');
                return;
            }
            const items = cartService.getSavedCart();
            renderCart.updateCartUI(items);
        });
    }

    return card;
}