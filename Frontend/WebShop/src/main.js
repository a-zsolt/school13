import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
import './style.css'

import { renderProducts } from './ui/renderProducts.js'
import { getProducts } from './api/productsApi.js'
import renderNav from './ui/renderNav.js'

async function main() {
    renderNav()
    const products = await getProducts()
    renderProducts(products)
}

main()