# Feladat: „Termék kártyák + Kosár” (Vue Options API, Bootstrap)

## Cél
Készíts egy **egyetlen oldalon** működő Vue alkalmazást (nem SPA, nincs routing), ahol:
- termékek **kártyákban** jelennek meg,
- a felhasználó terméket **hozzáadhat a kosárhoz**,
- a kosárban a mennyiséget **növelheti/csökkentheti**,
- tételt **törölhet**,
- látszik az **összesen** ár.

**Fókusz:** komponensek + **props** + **emits** (Bootstrap UI elemekkel).

---

## Megkötések
- **Vue.js Options API**
- **Bootstrap** (pl. Card, Button, List group, Badge, Alert)
- A state (adatok) **csak a szülő komponensben** legyen (App)
- A gyerek komponensek **nem módosíthatják a propokat** (csak `emit`-tel jeleznek)

---

## Dummy adatok
### Termék (product)
```js
{ id, name, price }
```

### Kosár tétel (cart item)
```js
{ id, name, price, qty }
```

---

## Kötelező komponensek (minimum 4)

### 1) `ProductList`
- **props:** `products`
- feladata: termékek megjelenítése rácsban (Bootstrap `row/col`)
- tartalmazza a `ProductCard`-okat

### 2) `ProductCard`
- **props:** `product`
- feladata: egy termék megjelenítése (Bootstrap `card`)
- gomb: **„Kosárba”**
- **emit:** `add-to-cart` (átadja a terméket)

### 3) `Cart`
- **props:** `items`
- feladata: kosár megjelenítése (Bootstrap `list-group`)
- összesítő rész: „Összesen”

### 4) `CartItemRow`
- **props:** `item`
- feladata: egy kosártétel sor (név, ár, qty)
- gombok: `+`, `-`, `Törlés`
- **emit:**
  - `inc` (átad: item id)
  - `dec` (átad: item id)
  - `remove` (átad: item id)

---

## Props & Emits – elvárt adatáramlás

### Props (szülő -> gyerek)
- `App -> ProductList : products`
- `App -> Cart : items`
- `ProductList -> ProductCard : product`
- `Cart -> CartItemRow : item`

### Emits (gyerek -> szülő)
- `ProductCard -> App : emit('add-to-cart', product)`
- `CartItemRow -> App : emit('inc', id)`
- `CartItemRow -> App : emit('dec', id)`
- `CartItemRow -> App : emit('remove', id)`

**Fontos:** a kosár módosítását mindig az `App` végzi, az események alapján.

---

## Bootstrap UI követelmények (minimum)
- Termékek: `card`, `badge` (árhoz)
- Gombok: `btn btn-primary`, `btn btn-sm`
- Kosár: `list-group`
- Üres kosár esetén: `alert alert-info`
- Elrendezés: két oszlop (pl. balra termékek, jobbra kosár) vagy egymás alatt

---

## Kötelező: tervezési rajz (kód előtt)
Készíts és küldj egy rövid tervet, ami tartalmazza:

### 1) Komponensfa
- `App`
  - `ProductList`
    - `ProductCard` × N
  - `Cart`
    - `CartItemRow` × M

### 2) Props/Emits nyilak
- Merre halad a kommunikáció az alkalmazásban

### 3) Képernyő vázlat
- Az alkamazás elemeinek hierarchikus megközelítése legyen benne.
- Hol lesz a terméklista és hol a kosár (pl. bal/jobb oszlop)
