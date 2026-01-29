# Laravel CRUD Feladat – 90 perces dolgozat / gyakorló feladat

## Cél
**Laravel entitás teljes CRUD funkcionalitását** (Create, Read, Update, Delete) elkészítse **Controller – Model – Blade** használatával.

---

## Entitás: `Book` (Könyv)

Egy egyszerű könyvnyilvántartó alkalmazást kell készíteni.

### Adatmezők
A `books` tábla a következő mezőket tartalmazza:

| Mező neve | Típus | Kötelező |
|---------|------|---------|
| id | bigint | igen |
| title | string | igen |
| author | string | igen |
| published_year | integer | igen |
| price | integer | igen |
| created_at | timestamp | igen |
| updated_at | timestamp | igen |

---

## 1. Adatbázis és Model

1. Készítsd el a `Book` modellt és a hozzá tartozó migrációt
2. A migráció hozza létre a `books` táblát a fenti mezőkkel
3. A modellben:
    - legyen beállítva a `$fillable` tömb
    - ne használj `$guarded = []`
4. Seederrel tölts be adatokat, legalább 10 féle könyvet

---

## 2. Controller

Hozd létre a `BookController`-t **resource controllerként**.

Valósítsd meg az alábbi metódusokat:

- `index()` – könyvek listázása
- `create()` – új könyv felviteléhez űrlap
- `store()` – új könyv mentése
- `edit(Book $book)` – könyv szerkesztése
- `update(Request $request, Book $book)` – könyv frissítése
- `destroy(Book $book)` – könyv törlése

### Követelmények:
- Sikeres művelet után legyen redirect

---

## 3. Route-ok

A `web.php` fájlban:

- vedd fel a controller függvényekhez a megfelelő útvonalakat
- az útvonal prefix legyen: `/books`

---

## 4. Blade nézetek

Készítsd el az alábbi Blade fájlokat:

### `resources/views/books/index.blade.php`
- Táblázatos lista az összes könyvről
- Oszlopok: cím, szerző, év, ár, műveletek
- Legyen:
    - „Új könyv” gomb
    - „Szerkesztés” gomb
    - „Törlés” gomb (POST + CSRF + method DELETE)

---

### `resources/views/books/create.blade.php`
- Űrlap új könyv felviteléhez
- Minden mezőhöz input

---

### `resources/views/books/edit.blade.php`
- Előre kitöltött űrlap
- Ugyanazok a mezők, mint a create-nél

---

## 5. Extra követelmények

- Használj **layoutot** (`layouts/app.blade.php`)
