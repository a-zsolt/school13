export default function renderNav() {
    let nav = document.createElement('nav');
    nav.className = "navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4";

    nav.innerHTML = `
            <div class="container-fluid ps-3 pe-3">
                <a class="navbar-brand" href="#">
                    <i class="bi bi-shop-window"></i>
                    WebShop
                </a>
                <button type="button" class="btn btn-primary position-relative m-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <i class="bi bi-bag"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
            </div>
    `;

    document.body.append(nav);
    return nav;

}