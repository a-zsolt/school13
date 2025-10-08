# Projekt: UFO észlelés nyilvántartó rendszer

Egy egyszerű több oldalasnak látszó PHP oldalt kell készíteni:
- A menü és a lábléc include-olva van
- Az észlelések egy asszociatív tömbben vannak
- az adatok megjelenítését/gyűjtését függvények végzik
- legalább egy GET kérés (megjelenített adatok szűrése)
- legalább egy POST kérés (látszólagos észlelés bejelentés)

File szerkezet
- index.php
- app/
    - data.php   //adatok
    - functions.php
    - view_functions.php  //megjelenítéssel kapcsolatos függvények
- view/
    - partials/
        - header.v.php
        - footer.v.php
    - pages/
    - home.v.php
    - report.v.php
    - list.v.php