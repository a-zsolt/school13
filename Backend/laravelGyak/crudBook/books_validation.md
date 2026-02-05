# Kiegészítő feladatsor – Validáció  
**Laravel Book CRUD feladathoz**

---

## Cél

A feladat célja, hogy a meglévő **Book CRUD** alkalmazást kiegészítsétek 
**szerveroldali validációval**, Laravel best practice-ek (FormRequest, hibakezelés) használatával.

---

## 1. FormRequest osztályok létrehozása (kötelező)

1. Hozd létre az alábbi FormRequest osztályokat:
   - `StoreBookRequest`
   - `UpdateBookRequest`

2. A `BookController`-ben:
   - a `store()` metódus `StoreBookRequest` típusú paramétert kapjon
   - az `update()` metódus `UpdateBookRequest` típusú paramétert kapjon

3. A validált adatokat a következő módon használd:
   - `$validated = $request->validated();`
   - új rekord mentése: `Book::create($validated);`
   - meglévő rekord frissítése: `$book->update($validated);`

---

## 2. Validációs szabályok (kötelező)

A következő szabályokat kell megvalósítani (ahol releváns, mindkét requestben):

### `title` – Cím
- kötelező
- string
- minimum 3 karakter
- maximum 120 karakter
- **egyedi** a `books` táblában  
  - Update esetén a saját rekord kivételével (unique ignore)

### `author` – Szerző
- kötelező
- string
- minimum 3 karakter
- maximum 80 karakter

### `published_year` – Kiadás éve
- kötelező
- egész szám
- minimum: 1450
- maximum: az aktuális év (dinamikusan)

### `price` – Ár
- kötelező
- egész szám
- minimum: 0
- maximum: 2 000 000

---

## 3. Egyedi hibaüzenetek és mezőnevek (kötelező)

### Egyedi hibaüzenetek
Állíts be egyedi magyar hibaüzeneteket legalább az alábbi esetekre:
- `title.required`
- `title.unique`
- `published_year.min`
- `published_year.max`
- `price.min`

### Magyar mezőnevek
A validációs hibákban a mezőnevek magyarul jelenjenek meg:
- `title` → Cím
- `author` → Szerző
- `published_year` → Kiadás éve
- `price` → Ár

---

## 4. Hibák megjelenítése a Blade nézetekben (kötelező)

A `create.blade.php` és `edit.blade.php` fájlokban:

1. Az oldal tetején jeleníts meg egy összesített hibablokkot, ha létezik validációs hiba.
2. Minden input mező alatt jelenjen meg a mezőhöz tartozó hibaüzenet.
3. Hibás beküldés után:
   - `create` oldalon az inputok az `old()` értékeket mutassák
   - `edit` oldalon:
     - ha van `old()` érték, azt
     - különben az eredeti `$book` adatát

---

## 5. Kiegészítő üzleti szabály (opcionális)

Valósítsd meg az alábbi üzleti szabályt:

- Ha a `published_year` az **aktuális év**, akkor a `price` **nem lehet 0**.

Megvalósítás lehetséges módjai:
- `withValidator()` vagy `after()` metódus a FormRequest-ben
- feltételes validációs szabály (`Rule::when(...)`)

A hibaüzenet legyen magyar nyelvű, például:
> „Az idei kiadású könyv ára nem lehet 0.”

---

## 6. Extra feladatok (opcionális)

1. `price` mező:
   - csak számot fogadjon el  
   - szóközökkel tagolt érték (pl. `12 000`) kezelése vagy tiltása

2. `title` mező:
   - ne fogadjon el csak whitespace értéket (pl. `"   "`)

3. Flash üzenetek sikeres műveletek után:
   - létrehozás: „Könyv sikeresen létrehozva.”
   - frissítés: „Könyv sikeresen frissítve.”
   - törlés: „Könyv törölve.”

---