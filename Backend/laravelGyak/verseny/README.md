# ORM (Eloquent) – Lekérdezéses gyakorló feladatok (a seedelt „Csapatverseny" adatokra)

**Feltételezés:** a modellek és a kapcsolatok (Team–Student, Team–Submission, Challenge–Submission) már készen vannak.

**Szabály:** minden feladatot Eloquent ORM-mel oldj meg (nincs kézzel írt SQL, nincs Query Builder join kötelező jelleggel).

**A megoldás formája lehet:** Tinker parancs, vagy Controller metódusban egy lekérdezés.

**Leadás:** tinker parancsok egy txt-ben vagy controller php fájl, ami tartalmazza az összes lekérést.

---

## 1) Csapatok névsora ABC-ben

Kérd le az összes csapatot név szerint rendezve.

**Elvárt kimenet:** csapatnév lista.

---

## 2) Csapatok + diákok száma

Listázd a csapatokat és mindegyiknél add vissza, hány diák van benne.

**Elvárás:** withCount() használata.

---

## 3) Csapatok, ahol legalább 3 diák van

Szűrd le azokat a csapatokat, ahol a diákok száma >= 3.

**Elvárás:** relationship alapú szűrés (has()/whereHas()).

---

## 4) Csapatok + beadások száma

Listázd a csapatokat és mindegyikhez add vissza, hány beadása van.

**Elvárás:** withCount('submissions').

---

## 5) „Scoreboard" – összpont csapatonként

Készíts listát csapatonként:
- csapat neve
- beadások száma
- összpont (points összege)

**Elvárás:** ORM-mel (javasolt: withSum() vagy with('submissions') + sum()).

---

## 6) Top 2 csapat összpont alapján

A scoreboardból add vissza a legjobb 2 csapatot.

**Elvárás:** rendezés összeg alapján.

---

## 7) Feladatok + beadások száma

Listázd a feladatokat és mindegyiknél add vissza a beadások számát.

**Elvárás:** withCount('submissions').

---

## 8) Feladatok, amire még nincs beadás

Szűrd le azokat a feladatokat, amelyekhez 0 beadás tartozik.

**Elvárás:** doesntHave('submissions').

---

## 9) Legnagyobb pontszámú beadás

Keresd meg a beadást, ahol a pont a legnagyobb, és add vissza:
- csapat neve
- feladat címe
- pont

**Elvárás:** eager loading (with(['team','challenge'])).

---

## 10) Egy adott csapat beadásai (kapcsolt adatokkal)

Egy adott csapat (pl. „Kék Cápák") beadásait listázd úgy, hogy látszódjon:
- feladat címe
- pont

**Elvárás:** csapat keresése név alapján, majd relationship bejárás.

---

## 11) Csapatok, akik adtak be megoldást egy adott feladatra

Pl. „ORM kapcsolatok alapjai" feladatra kik adtak be?

**Elvárás:** whereHas() a submissions-on belül challenge szűréssel.

---

## 12) Csapatok, akik NEM adtak be egy adott feladatra

Ugyanaz a feladat, de a „nem adtak be" lista.

**Elvárás:** whereDoesntHave().

---

## 13) Feladatonként átlagpont

Számold ki feladatonként a beadások átlagpontját.

**Elvárás:** Eloquent aggregáció (javasolt: withAvg() vagy submissions()->avg('points')).

---

## 14) Csapatonként átlagpont (beadásokra)

Számold ki csapatonként a beadások átlagpontját.

**Elvárás:** Eloquent aggregáció.

---

## 15) Csapatok, ahol van 0 pontos beadás

Listázd azokat a csapatokat, ahol legalább egy beadás pontszáma 0.

**Elvárás:** whereHas('submissions', fn($q)=>...).

---

## 16) Feladatok, ahol volt max pontos beadás

Listázd azokat a feladatokat, ahol létezik olyan beadás, ami elérte a feladat max_points értékét.

**Elvárás:** relationship + feltétel. (Tipp: whereColumn('submissions.points', 'challenges.max_points') jellegű gondolkodás; ORM-mel megoldva.)

---

## 17) „Csapat–Feladat mátrix": ki mennyit szerzett feladatonként

Készíts olyan lekérdezést, ami beadásokat ad vissza így:
- csapatnév
- feladatcím
- pont

Majd rendezd:
- csapatnév szerint
- feladatcím szerint

**Elvárás:** eager loading + rendezés.

---

## 18) Legutolsó 3 beadás (kapcsolt adatokkal)

Kérd le a legutóbbi 3 beadást, és add vissza:
- csapatnév
- feladatcím
- pont

**Elvárás:** latest() + take(3) + with().

---

## 19) Csapat részletek: diákok + beadások egy lekérdezéssel

Egy adott csapatnál töltsd be egyszerre:
- diákokat
- beadásokat és azok feladatait

**Elvárás:** Team::with(['students','submissions.challenge']).

---

## 20) N+1 elkerülés: beadások listája optimálisan

Készíts beadáslistát, ami táblázatban megjeleníthető (csapat + feladat + pont), úgy hogy:
- a lekérdezés eager loading-gal történik
- a view-ban nincs újabb adatbázis-lekérdezés

**Elvárás:** with(['team','challenge']).

---

## Opcionális „+" feladatok

### 21) Csapatok rangsora: döntetlen esetén a beadások száma döntsön

Csapatok rangsora: döntetlen esetén a beadások száma döntsön (több beadás előrébb).

### 22) „Tiszta teljesítmény": csapatonként csak a legjobb beadás számítson feladatonként

„Tiszta teljesítmény": csapatonként csak a legjobb beadás számítson feladatonként (ha többször adhatnak be).
