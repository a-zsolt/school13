export default function showProducts(products = []){
    let cardGrid = document.createElement('div')
    cardGrid.classList = "row row-cols-1 row-cols-md-3 g-4"

    products.forEach(product => {
        cardGrid.appendChild(productCard(product));
    })
}

function productCard(product) {
    let card = document.createElement('div')
    card.className = "col"

    card.innerHTML = `
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">${product.name}</h5>
                <p class="card-text">${product.price}</p>
                <button class="btn btn-primary">Add to cart</button>
            </div>
        </div>
    `
}