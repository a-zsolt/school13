# Verseny Dashboard – ORM Relations SSR Feladat

Készíts egy „Verseny Dashboard" nevű mini webes felületet Laravelben, ahol a korábban megírt ORM
lekérdezések eredményei SSR (Blade) oldalakra integrálva, formázott táblázatokban/kártyákban megjelennek.

## A feladat lényege

- A lekérdezések Controllerben készülnek
- A Blade csak megjelenít
- SSR = Server Side Rendering: minden oldal HTML-ként, szerver oldalon renderelődik (Blade)
- Lekérdezés helye: kizárólag Controller(ek)ben (vagy Service-ben), nem a Blade-ben
- Blade-ben tilos `Model::...` jellegű lekérdezés
- Formázás: Választható CSS keretrendszerben (CDN) használata ajánlott, minimum:
    - legyen layout, navbar
    - legyen legalább 3 táblázat
    - legyen legalább 2 „kártya" (card)

## Oldalak és route-ok

Készíts legalább az alábbi SSR oldalakat:

1. Dashboard – `GET /` (vagy `GET /dashboard`)
2. Csapatok – `GET /teams`
3. Feladatok – `GET /challenges`
4. Beadások – `GET /submissions`
5. Csapat részletek – `GET /teams/{team}` (kötelező, mert több lekérdezés ide kerül)

## Layout és navigáció

- `resources/views/layouts/app.blade.php`
- Navbar linkek:
    - Dashboard
    - Csapatok
    - Feladatok
    - Beadások

Minden oldal ezt a layoutot használja: `@extends('layouts.app')`

---

## A lekérdezések integrálása

Az alábbi lista azt mondja meg, melyik lekérdezés melyik oldalon jelenjen meg.

### A) Dashboard oldal (`GET /`)

Ezen az oldalon gyors áttekintés legyen: top csapatok, rekordok, legutóbbi események.

**Itt jelenjen meg:**
- (6) Top 2 csapat összpont alapján
- (9) Legnagyobb pontszámú beadás
- (18) Legutolsó 3 beadás

**Megjelenítés elvárás (UI):**
- 3 külön „card" (Top2 / Rekord beadás / Legutóbbi 3 beadás)
- Top2 és Legutóbbi 3 beadás táblázatban

---

### B) Csapatok oldal (`GET /teams`)

Ezen az oldalon csapat statisztikák legyenek.

**Itt jelenjen meg:**
- (1) Csapatok névsora ABC-ben
- (2) Csapatok + diákok száma (`withCount` kötelező)
- (4) Csapatok + beadások száma (`withCount('submissions')`)
- (5) Scoreboard – összpont csapatonként
- (14) Csapatonként átlagpont (beadásokra)

**Megjelenítés elvárás (UI):**
- 1 fő táblázat, amely egy sorban hozza a csapat statisztikákat:
    - csapatnév | diákok száma | beadások száma | összpont | átlagpont
- Rendezés: csapatnév ABC

---

### C) Feladatok oldal (`GET /challenges`)

Ezen az oldalon feladat statisztikák legyenek.

**Itt jelenjen meg:**
- (7) Feladatok + beadások száma (`withCount` kötelező)
- (8) Feladatok, amire még nincs beadás (`doesntHave` kötelező)
- (13) Feladatonként átlagpont
- (16) Feladatok, ahol volt max pontos beadás

**Megjelenítés elvárás (UI):**
- 1 fő táblázat:
    - feladat cím | max_points | beadások száma | átlagpont | volt-e max pontos? (igen/nem jelzés)
- 1 külön card/lista: „Feladatok, amire még nincs beadás"

---

### D) Beadások oldal (`GET /submissions`)

Ezen az oldalon a beadások listája és egy mátrix-szerű nézet szerepel.

**Itt jelenjen meg:**
- (17) Csapat–Feladat mátrix (csapatnév, feladatcím, pont) + rendezés
- (20) N+1 elkerülés: beadások listája optimálisan (`with(['team','challenge'])` kötelező)

**Megjelenítés elvárás (UI):**
- 2 card egymás alatt:
    1. „Beadások (optimalizált lista)" – táblázat
    2. „Csapat–Feladat mátrix" – táblázat (csapat, feladat, pont)

---

### E) Csapat részletek oldal (`GET /teams/{team}`)

Ezen az oldalon egy konkrét csapat elemzése történik.

**Itt jelenjen meg:**
- (10) Egy adott csapat beadásai (kapcsolt adatokkal)
- (19) Csapat részletek: diákok + beadások egy lekérdezéssel
- (15) Csapatok, ahol van 0 pontos beadás

**Megjelenítés elvárás (UI):**
- Fent: csapatnév + összpont + átlagpont (kicsi stat kártyák)
- Közép: diákok listája
- Lent: beadások táblázata (feladat, pont)
- Extra: ha van 0 pontos beadás, piros figyelmeztetés

---

## Leadandó

1. `routes/web.php`
2. Controller(ek) kódja (lekérdezésekkel)
3. Blade nézetek (formázott táblázatok/kártyák)

> A feladat nem arról szól, hogy „tinkerben lefut", hanem arról, hogy ugyanazokat az ORM
> lekérdezéseket egy valódi SSR webes felület részeként tudod megjeleníteni.
