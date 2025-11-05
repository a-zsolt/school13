export function renderCart(nav){
    let cartOffCanvas = document.createElement('div')

    cartOffCanvas.innerHTML = `
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Kosár</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
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