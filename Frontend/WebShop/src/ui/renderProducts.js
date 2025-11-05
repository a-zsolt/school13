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
        <div class="card shadow-sm" style=" border: none; border-radius: 12px; overflow: hidden;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold mb-2">${product.name}</h5>
                <div class="mt-auto">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-primary fw-bold">${product.price} Ft</h4>
                        <button class="btn btn-primary px-4">Kosárba</button>
                    </div>
                </div>
            </div>
        </div>

    `

    return card;
}