# Laravel API Feladat

## Entitás választás

Mindenki válasszon **1 tetszőleges entitást** (példák):

- Movie, Game, Student, Event, Tool, Recipe, DiveSite, stb.
- ⚠️ **Nem csak ezek közül lehet választani!**

---

## Követelmény (minimum mezők)

- `id`
- **6 db kötelező mező**, több is lehet
    - Legalább 1-1: `string`, `int`, `enum` mező!
- `timestamps`

---

## Lépések

### 1. Model + Migration + Seeder létrehozása

- Hozz létre **Model + migration + seeder** fájlokat
- Konfiguráld a **Model** szükséges beállításait
- Készítsd el a **migrationt** a tervezett mezőknek megfelelően
- Készíts **seedert**, ami legalább **3 különböző rekordot** hoz létre a táblában

### 2. API Controller + Validációs Requestek

- Hozd létre az **API Controllert** és a **Validációs Requesteket**
- Hozd létre az API Controllerhez a megfelelő **Route bejegyzéseket**

### 3. Controller metódusok implementálása

- Valósítsd meg a **Controller metódusokat** és **Validációs Requesteket**
- A metódusok minden esetben **JSON-nel válaszoljanak**
- Ügyelj a megfelelő **státusz kódra** és az **egységes JSON szerkezetre**
- Valósítsd meg a **Validációs Requesteket** — a bemenetek legyenek **szigorúan ellenőrizve** a szabályokkal

---

## Ellenőrzési lista (működik-e?)

| Végpont | Elvárt válasz |
|---|---|
| `GET /api/movies` | `200` + JSON tömb |
| `POST /api/movies` | `201` + létrejött elem |
| `POST /api/movies` *(hibás adatok)* | `422` + hiba üzenetek JSON |
| `GET /api/movies/1` | `200` vagy `404` |
| `PUT/PATCH /api/movies/1` | `200` |
| `PUT/PATCH /api/movies/1` *(hibás adatokkal)* | `422` + hiba üzenetek JSON |
| `DELETE /api/movies/1` | `204` |

---

## Leadás

A következő fájlokat kell leadni:

- [ ] Model
- [ ] Seeder
- [ ] Migration
- [ ] API Controller
- [ ] `api.php` Route file
- [ ] Validációs Requestek
