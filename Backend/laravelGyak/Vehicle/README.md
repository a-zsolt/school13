**Önálló feladat (135 perc) – Laravel ORM: Bérelhető járművek (Vehicle)
Cél**
Készíts Laravelben egy „Bérelhető járművek” modult, amely:

- adatbázisban tárolja a járművek adatait (Model + Migration),
- listázza a járműveket rendezhető módon (Controller index),
- megjeleníti egy jármű részleteit (Controller show),
- egyszerű, de igényes felületet ad **kötelezően Bulma CSS** használatával,
- a megjelenítésben **kártya + táblázat + felsorolás** elemeket is kötelezően használ.
  **1) Kötelező technikai elemek
  1.1 Model + Migration (kötelező)**
  Hozd létre a Vehicle modellt és a hozzá tartozó migrációt.
  Parancs (javasolt):
  php artisan make:model Vehicle -m
  **Adatbázis tábla: vehicles**
  A migrációban hozd létre az alábbi mezőket:
  **Mező Típus Kötelező Megjegyzés**

id increments igen (^)
name string(120) igen jármű neve
type string(50) igen pl. autó, kisteher, motor
daily_price unsignedInteger igen Ft/nap
deposit unsignedInteger nem kaució Ft
license_plate string(20) igen **unique**
seats unsignedTinyInteger nem férőhely


```
Mező Típus Kötelező Megjegyzés
is_available boolean igen default: true
```
description text nem (^)
created_at / updated_at timestamps igen (^)
Követelmények:

- name, type, daily_price, license_plate kötelező.
- license_plate legyen **egyedi**.
- is_available alapértelmezetten true.
  Migráció futtatása:
  php artisan migrate
  **2) Route-ok (kötelező, ütközésmentesen)**
  A rendezés paraméterezése **route paraméterrel** történjen (nem query stringgel).
  **Kötelező URL szerkezet**
- **Alapértelmezetten rendezett Lista:**
  GET /vehicles → VehicleController@index
- **Lista:**
  GET /vehicles/sort/{sort?} → VehicleController@index
- **Részletek:**
  GET /vehicles/{id} → VehicleController@show
  Követelmények:
- sort opcionális paraméter (lehet üres).
- A route-ok kapjanak nevet:
  o vehicles.index
  o vehicles.index.sort
  o vehicles.show


**3) Controller (kötelező)**
Hozd létre a VehicleController-t.
Parancs (javasolt):
php artisan make:controller VehicleController
**3.1 index($sort = null) (kötelező)**
Feladata:

- lekéri a járműveket **rendezve** ,
- a rendezési oszlopot a route paraméterből kapja,
- átadja a listát és a statisztikákat a nézetnek.
  **Rendezés szabályai (kötelező)**
  A rendezési oszlopot **whitelist** - tel kell védeni, csak ezek engedélyezettek:
- name
- type
- daily_price
- seats
- is_available
  Alapértelmezés:
- ha nincs sort, vagy rossz érték érkezik → rendezés daily_price szerint növekvő.
  **Statisztikák (kötelező)**
  A controller számolja ki és adja át a view-nak:
- összes jármű száma
- elérhető járművek száma
- nem elérhető járművek száma
  **3.2 show($id) (kötelező)**
  Feladata:
- egy jármű betöltése id alapján,


- 404, ha nem található (pl. findOrFail),
- adat átadása a vehicles.show nézetnek.
  **4) Kötelező Bulma CSS + Layout
  4.1 Bulma kötelező**
- Csak **Bulma** használható (Bootstrap/Materialize nem).
- Bulma CDN-t a layoutban töltsd be.
  **4.2 Layout kötelező**
  Készíts layoutot:
- resources/views/layouts/app.blade.php
  Elvárás:
- legyen @yield('title') és @yield('content')
- legyen Bulma navbar a tetején (pl. „Járműkölcsönző” felirattal)
- a tartalom container-ben jelenjen meg
  A nézetek ezt használják:
- @extends('layouts.app')
  **5) Nézetek (kötelező) + megjelenítési nehezítések**
  Készítsd el:
- resources/views/vehicles/index.blade.php
- resources/views/vehicles/show.blade.php
  **5.1 Index nézet: vehicles/index.blade.php (kötelező UI struktúra)
  A) Összefoglaló kártyák (kötelező: Bulma card + columns)**
  Az oldal tetején legyen **3 kártya egymás mellett** :
1. **Összes jármű**
2. **Elérhető**


3. **Nem elérhető**
   Követelmény:
- A számok a controllerből jöjjenek (ne a view-ban számolj).
  **B) Rendezés sáv (kötelező: Bulma tabs vagy buttons)**
  A kártyák alatt legyen rendezési sáv, linkekkel:
- Név
- Típus
- Napi díj
- Férőhely
- Elérhető
  Követelmények:
- a linkek a vehicles.index route-ra menjenek a megfelelő {sort} paraméterrel,
  o <a href=”/vehicles/sort/name”>Név</a>
- az aktuális rendezés legyen vizuálisan jelölve (pl. aktív tab).
  **C) Táblázat (kötelező: Bulma table)**
  A járművek táblázatban jelenjenek meg:
  Oszlopok:
- Név (link a részletezőre)
- Típus
- Napi díj (Ft/nap formátumban)
- Férőhely
- Elérhető? (színes tag)
  Követelmények:
- Elérhető = zöld Bulma tag is-success
- Nem elérhető = piros Bulma tag is-danger
- Ár legyen formázva (pl. 12 500 Ft/nap)


Üres lista esetén:

- Bulma notification-nel jelezd: „Nincs megjeleníthető jármű.”
  **5.2 Show nézet: vehicles/show.blade.php (kötelező UI struktúra)
  A) Fejléc kártya (kötelező: Bulma card)**
  Felül egy nagy kártya:
- jármű neve (title)
- rendszám (subtitle vagy tag)
- elérhetőség (zöld/piros tag)
  **B) Kétoszlopos „Fő adatok” rész (kötelező: Bulma columns)**
  Két oszlop:
  **Bal oszlop (pénzügy – card vagy box):**
- Napi díj
- Kaució (ha nincs: „nincs megadva”)
  **Jobb oszlop (műszaki – card vagy box):**
- Típus
- Férőhely (ha nincs: „nincs megadva”)
  **C) Feltételek felsorolás (kötelező: ul/li)**
  Legyen „Feltételek” cím alatt egy felsorolás (minimum 3 pont). Lehet statikus szöveg, pl.:
- Átvételkor személyi igazolvány szükséges
- Minimum bérlés: 1 nap
- Üzemanyag nem része az árnak
  **D) Leírás (kötelező: Bulma box)**
  A felsorolás alatt külön box-ban:
- a jármű description mezője,
- ha nincs leírás: „nincs leírás”


**E) Navigáció**
Legyen vissza gomb a listára (Bulma button).
**Leadás**
A feladat leadásakor az alábbiakat kell beadni:

- **Teljes Laravel projekt forráskódja** (ZIP-ben, vendor mappa nélkül)
- **Rövid leírás** (README.txt, max. 5–10 sor)
  o Mely feladatrészek okoztak nehézséget a megoldás során, miért?
- **Képernyőképek (max. 4 db)**
  o index oldal (kártyák + rendezés + táblázat)
  o index oldal rendezés aktív állapotban
  o show oldal (fejléc + fő adatok)
  o show oldal (felsorolás + leírás + vissza gomb)


