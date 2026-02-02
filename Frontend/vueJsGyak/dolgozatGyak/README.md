# Dolgozat: Bevásárlólista – Termékek kezelése (Vue.js Options API)

## Cél
Készíts egy egyszerű, **két komponensből álló** Vue alkalmazást, amellyel a felhasználó bevásárlólistát tud kezelni: terméket felvenni, mennyiséget módosítani, törölni, és a lista összesített adatait látni.

## Kötelező technológiák
- **Vue.js (Options API)**
- **Bootstrap 5** a kinézethez
- **Bootstrap Icons** ikonok használatához

---

## Komponensek
Az alkalmazás **pontosan 2 komponensből** álljon:

1. **App.vue** (szülő komponens)
2. **ShoppingItem.vue** (gyerek komponens – egy sor/elem megjelenítése)

---

## Funkcionális követelmények

### 1) App.vue (szülő komponens)

**Feladata:**
- Kezeli a termékek listáját (state).
- Tartalmaz egy űrlapot új termék felvételéhez.
- Megjeleníti a listát a gyerek komponenseken keresztül.

**Adatszerkezet (javasolt):**
Egy termék legyen objektum, pl.:
- `id` (egyedi azonosító)
- `name` (termék neve)
- `qty` (mennyiség – szám)
- `bought` (boolean – megvették-e)

**Kötelező elemek az App.vue-ban:**
- **methods:**
  - `addItem()` – új termék hozzáadása az input mezőkből
  - `removeItem(id)` – termék törlése
  - `updateQty({ id, delta })` – mennyiség növelése/csökkentése (delta: +1 / -1)
  - `toggleBought(id)` – megvett státusz váltása
- **computed:**
  - `totalItems` – összes termék darabszáma **vagy**
  - `boughtCount` – megvett elemek száma **vagy**
  - `remainingCount` – még nem megvett elemek száma
- **Bootstrap design követelmény:**
  - legyen **Navbar** vagy fejléc (pl. „Bevásárlólista”)
  - az űrlap Bootstrap form elemekkel készüljön (`form-control`, `btn`, `input-group` stb.)
  - legyen egy összegző kártya (Bootstrap `card`), ahol a computed eredmény(ek) látszanak

---

### 2) ShoppingItem.vue (gyerek komponens)

**Feladata:**
- Egyetlen termék megjelenítése sorban/kártyában.
- Gombokkal jelezheti a felhasználó, mit szeretne tenni.

**Kötelező elemek a ShoppingItem.vue-ban:**
- **props:**
  - `item` (objektumként kapja meg a terméket az App.vue-tól)
- **emit:**
  A gyerek komponens **nem módosíthatja közvetlenül** a listát, csak eseményt küld a szülőnek.  
  Kötelező események:
  - `remove` (paraméter: `id`)
  - `change-qty` (paraméter: `{ id, delta }`)
  - `toggle-bought` (paraméter: `id`)
- **methods:**
  - `onRemove()` - Törlés
  - `onInc()`  Nővelés +1-el
  - `onDec()` - Csökkentés -1-el
  - `onToggle()` – Vásároltnak jelzés
- **Bootstrap + ikonok:**
  - Törlés gomb: trash ikon (`bi-trash`)
  - Növelés: plus (`bi-plus`)
  - Csökkentés: dash (`bi-dash`)
  - Megvett jelölés: check / cart-check (`bi-check2` vagy `bi-cart-check`)



## Validáció és szabályok
- Nem lehet üres terméknevet felvenni.
- Mennyiség nem mehet **1 alá** (csökkentésnél védd le).
- Használj egyedi `id`-t (pl. `Date.now()`).

---
