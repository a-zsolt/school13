# Feladat: Mini Webshop (ES Modules + Mock adatok)

## Rövid leírás
Készíts egy mini webshopot, amely listáz termékeket egy mock adatforrásból, lehetővé teszi a
termékek kosárba helyezését, a kosár tartalma megmarad újratöltés után is, és a kosárnézetben végösszeget jelenít meg.

## Követelmények / funkciók
1. Terméklista oldal
   * Termékek betöltése mock adatforrásból.
   * Minden termékkártyán: név, ár, (opcionálisan kép), „Kosárba” gomb.
2. Kosár
   * Tétel hozzáadás/eltávolítás, mennyiség növelés/csökkentés.
   * Végösszeg (nettó listaárak összege mennyiséggel szorozva).
   * Perzisztencia: kosár állapota megmarad oldalfrissítés után is (localStorage).
3. Fejléc / nav indikátor
   * Kosár ikon melletti darabszám vagy összeg jelzése.
4. Üres állapotok
    * Ha nincs termék, ha üres a kosár – jelenjen meg érthető üzenet.
5. Hibakezelés
    * Hibás betöltésnél felhasználóbarát hibaüzenet és „Próbáld újra” lehetőség.

## Technikai megkötések

* /src
  * /api/productsApi.js      // mock fetch ide kell valami ami adatokat tud szolgáltatni 
  * /cart/cartService.js     // üzleti logika + localStorage
  * /ui/renderProducts.js    // lista renderelés
  * /ui/renderCart.js        // kosár renderelés
  * /utils/money.js          // formázás, árkalkuláció
  * main.js                  // belépési pont
* index.html
* styles.css


## Mock
```JSON
[
  { "id": "p1",  "name": "Kék bögre",           "price": 1490, "image": "mug-blue.jpg",        "stock": 24 },
  { "id": "p2",  "name": "Piros póló",          "price": 3990, "image": "shirt-red.jpg",       "stock": 15 },
  { "id": "p3",  "name": "Notebook matrica",    "price": 690,  "image": "sticker-notebook.jpg","stock": 120 },
  { "id": "p4",  "name": "Fehér bögre",         "price": 1490, "image": "mug-white.jpg",       "stock": 30 },
  { "id": "p5",  "name": "Fekete sapka",        "price": 3290, "image": "cap-black.jpg",       "stock": 18 },
  { "id": "p6",  "name": "Zöld kulacs",         "price": 2590, "image": "bottle-green.jpg",    "stock": 40 },
  { "id": "p7",  "name": "Laptop táska",        "price": 11990,"image": "laptop-bag.jpg",      "stock": 8  },
  { "id": "p8",  "name": "Egérpad",             "price": 1290, "image": "mousepad.jpg",        "stock": 75 },
  { "id": "p9",  "name": "Bluetooth fülhallgató","price": 9990,"image": "earbuds-bt.jpg",      "stock": 12 },
  { "id": "p10", "name": "Hátizsák",            "price": 8990, "image": "backpack.jpg",        "stock": 20 }
]
```
## Bootstrap segédlet
Ha a bootstrap-et szeretnétek használni a következő képpen kell tenni:  
1. npm i bootstrap
2. main.js importok 
    1. import  'bootstrap'
    2. import 'bootstrap/dist/css/boostrap.min.css'