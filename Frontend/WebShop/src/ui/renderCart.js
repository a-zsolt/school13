import { updateCartBadge } from './renderNav.js';
import { changeItemQuantity } from '../cart/cartService';
import { calculateTotal } from '../utils/money.js';

export function init(nav){
    let cartOffCanvas = document.createElement('div')

    cartOffCanvas.innerHTML = `
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Kosár</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div id="itmes">
            <small>A kosár üres</small>
        </div>
        <div class="d-flex justify-content-end align-items-center mt-3">
            <button class="btn btn-primary w-50" disabled>Fizetéshez</button>
        </div>
      </div>
    </div>
    `

    nav.after(cartOffCanvas);
}

export function updateCartUI(items = []){
  const cartOffCanvas = document.getElementById('offcanvasNavbar');
  if (!cartOffCanvas) return;

  if(items.length === 0){
    const target = cartOffCanvas.querySelector('#itmes');
    if (target) target.innerHTML = `
		<div class="d-flex justify-content-center align-items-center" style="height: 100px;">
			<small>A kosár üres</small>
		</div>
		`;
    const btn = cartOffCanvas.querySelector('button.btn-primary');
    if (btn) btn.setAttribute('disabled', 'disabled');
    return;
  }

  let cartItemCount = items.reduce((total, item) => total + item.quantity, 0);
  updateCartBadge(cartItemCount);
  
  let itemList = document.createElement('ul');
  itemList.className = "list-group list-group-flush";
  items.forEach(item => {
    let itemElement = document.createElement('li');
    itemElement.className = "list-group-item";
    itemElement.innerHTML = `
	<div class="d-flex justify-content-between align-items-center">
      <div>
        <h6 class="mb-0">${item.name}</h6>
		<div class="input-group input-group-sm" style="max-width: 85px;">
			<button class="btn btn-outline-secondary" type="button">-</button>
			<input type="number" class="form-control quantity-input" aria-label="itme quantity" aria-describedby="item quantity" value="${item.quantity}">
			<button class="btn btn-outline-secondary" type="button">+</button>
		</div>
      </div>
      <div class="fw-bold text-primary">${calculateTotal(item.quantity, item.price)}</div>
	</div>
    `;

	const decreaseBtn = itemElement.querySelector('button:first-of-type');
	const increaseBtn = itemElement.querySelector('button:last-of-type');
	const quantityInput = itemElement.querySelector('input.quantity-input');

	decreaseBtn.addEventListener('click', () => {
		let newQuantity = parseInt(quantityInput.value) - 1;
		quantityInput.value = newQuantity;
		if (newQuantity < 1){
			newQuantity = 0;
			decreaseBtn.disabled = true;	
		} 
		changeItemQuantity(item.id, newQuantity);
	}

	);
	increaseBtn.addEventListener('click', () => {
		let newQuantity = parseInt(quantityInput.value) + 1;
		quantityInput.value = newQuantity;
		if (!changeItemQuantity(item.id, newQuantity)) {
			quantityInput.value = item.quantity;
			increaseBtn.disabled = true;
		}
	});

	quantityInput.addEventListener('change', () => {
		let newQuantity = parseInt(quantityInput.value);
		if (isNaN(newQuantity) || newQuantity < 0) {
			newQuantity = 0;
			quantityInput.value = newQuantity;
		}
		if (!changeItemQuantity(item.id, newQuantity)) {
			quantityInput.value = item.quantity;
		}
	});

    itemList.appendChild(itemElement);
  });

  const holder = cartOffCanvas.querySelector('#itmes');
  if (holder) {
    holder.innerHTML = '';
    holder.appendChild(itemList);
  }
  const btn = cartOffCanvas.querySelector('button.btn-primary');
  if (btn) btn.removeAttribute('disabled');
}