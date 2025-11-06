import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
import './style.css'

import { renderProducts } from './ui/renderProducts.js'
import { getProducts } from './api/productsApi.js'
import renderNav from './ui/renderNav.js'
import * as renderCart from './ui/renderCart.js'
import * as cartService from './cart/cartService.js';

async function init() {
    renderCart.init(renderNav())
    renderCart.updateCartUI(cartService.getSavedCart())
    const products = await getProducts()
    renderProducts(products)
}

init()