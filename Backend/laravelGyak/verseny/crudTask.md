# Minimális CRUD

## Cél

A korábbi „Verseny Dashboard" SSR projektet egészítsd ki minimális CRUD elemekkel,
hogy egy kezelhető, működő mini rendszerré álljon össze, és a korábban elkészített
lekérdezések eredményei SSR nézetekben, formázott felületen frissüljenek (új adat
felvitel/törlés után).

---

## Feladatok

### 1) Submissions CRUD: CREATE + DELETE + INDEX szűrőkkel

#### 1.1 Új beadás rögzítése (SSR form)

- `GET /submissions/create`
- `POST /submissions`

**Űrlap mezők:**
- team (select)
- challenge (select)
- points (number)

**Validáció minimum:**
- `team_id` exists
- `challenge_id` exists
- `points >= 0`
- `points <= kiválasztott challenge max_points`

#### 1.2 Beadás törlése

- `DELETE /submissions/{submission}`
- submissions/index táblázatban legyen „Törlés" gomb (confirm)

#### 1.3 Submissions index SSR szűrők

- `GET /submissions?team_id=&challenge_id=`
- 2 db `<select>` (team + challenge)
- a kiválasztás maradjon kijelölve (state)

---

### 2) Teams: MINIMÁL CREATE + Team show

#### 2.1 Új csapat létrehozása

- `GET /teams/create`
- `POST /teams`

**Validáció:**
- `name` required, min 2, max 80, unique

#### 2.2 Team részletek oldal (SSR)

- `GET /teams/{team}`

**Jelenjen meg:**
- csapat neve
- diákok listája (csak read)
- beadások táblázata: feladat címe + pont
- összpont + átlagpont (kicsi stat blokkok)

---

### 3) Dashboard: Top2 + rekord + last3 + teendők

Oldal: `GET /` vagy `GET /dashboard`

**Jelenjen meg SSR kártyákban/táblázatokban:**
- Top 2 csapat összpont alapján (korábbi 6)
- Legnagyobb pontszámú beadás (korábbi 9)
- Legutolsó 3 beadás (korábbi 18)
- Teendők / hiányok:
    - Feladatok, amire még nincs beadás (korábbi 8) – max 5 elem

> Elvárás: új beadás felvitele/törlése után a dashboard tartalma változzon.

---

### 4) Challenges: MINIMÁL CREATE + statisztika

#### 4.1 Új feladat létrehozása

- `GET /challenges/create`
- `POST /challenges`

**Validáció:**
- `title` required, 2–120 karakter
- `max_points` integer, 1–1000

#### 4.2 Challenges index statisztika

- `GET /challenges`

**Jelenjen meg táblázatban:**
- title
- max_points
- beadások száma (korábbi 7)
- átlagpont (korábbi 13)

---

## Kötelező route-ok

- `GET /` (dashboard)
- `GET /teams/create`, `POST /teams`
- `GET /teams/{team}`
- `GET /challenges`, `GET /challenges/create`, `POST /challenges`
- `GET /submissions`, `GET /submissions/create`, `POST /submissions`, `DELETE /submissions/{submission}`

## UI minimum

- `layouts/app.blade.php` + navbar: Dashboard / Teams / Challenges / Submissions
- CSS Framework
- Táblázatok + kártyák (card)
- Flash üzenetek (success/error)
- Űrlap hibaüzenetek

---

## Leadandó – Teljes működő Laravel projekt

Ezúttal nem csak kódrészleteket, hanem a teljes, működő Laravel projektet kell beadni.

### Kötelező működési feltétel

A projektnek az alábbi parancsok futtatása után azonnal működnie kell:

```bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
