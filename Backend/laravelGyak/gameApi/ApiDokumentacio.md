# Games API – Dokumentáció

## Entitás mezői

### `Game`

| Mező           | Típus     | Kötelező | Validáció                                                                 |
|----------------|-----------|------|---------------------------------------------------------------------------|
| `id`           | integer   | auto | Automatikusan generált                                                    |
| `title`        | string    | igen | max: 255 karakter                                                         |
| `release_year` | integer   | igen | min: 1900, max: aktuális év                                               |
| `developer`    | string    | igen | max: 255 karakter                                                         |
| `genre`        | enum      | igen | `Action`, `Adventure`, `RPG`, `Strategy`, `Sports`, `Simulation`, `Other` |
| `score`        | integer   | igen | min: 0, max: 100                                                          |
| `price`        | integer   | igen | min: 0, max: 500                                                          |
| `created_at`   | timestamp | auto | Automatikusan generált                                                    |
| `updated_at`   | timestamp | auto | Automatikusan generált                                                    |

---

## Endpointok listája

| Method   | Path                | Leírás                        | Success kód |
|----------|---------------------|-------------------------------|-------------|
| `GET`    | `/api/games`        | Összes játék listázása        | 200 OK      |
| `POST`   | `/api/games`        | Új játék létrehozása          | 201 Created |
| `GET`    | `/api/games/{id}`   | Egy játék lekérdezése ID alapján | 200 OK   |
| `PUT`    | `/api/games/{id}`   | Játék teljes frissítése       | 200 OK      |
| `PATCH`  | `/api/games/{id}`   | Játék részleges frissítése    | 200 OK      |
| `DELETE` | `/api/games/{id}`   | Játék törlése                 | 200 OK      |

> **Base URL:** `http://localhost:8000`  
> **Content-Type:** `application/json`

---

## Minta requestek

### POST `/api/games` – Új játék létrehozása

**Headers:**
```
Content-Type: application/json
Accept: application/json
```

**Request Body:**
```json
{
    "title": "The Witcher 3",
    "release_year": 2015,
    "developer": "CD Projekt Red",
    "genre": "RPG",
    "score": 93,
    "price": 15
}
```

---

### PUT `/api/games/{id}` – Játék teljes frissítése

**Headers:**
```
Content-Type: application/json
Accept: application/json
```

**Request Body:**
```json
{
    "title": "The Witcher 3: Wild Hunt",
    "release_year": 2015,
    "developer": "CD Projekt Red",
    "genre": "RPG",
    "score": 95,
    "price": 10
}
```

---

### PATCH `/api/games/{id}` – Játék részleges frissítése

> PUT/PATCH esetén csak a módosítani kívánt mezőket kell megadni.
> Az Update request-nél egyetlen mező sem kötelező.

**Request Body (csak az ár frissítése):**
```json
{
    "price": 5
}
```

---

## Minta response-ok

### GET `/api/games` – 200 OK

```json
{
    "success": true,
    "message": "List of games",
    "data": [
        [
            {
                "id": 1,
                "title": "The Witcher 3",
                "release_year": 2015,
                "developer": "CD Projekt Red",
                "genre": "RPG",
                "score": 93,
                "price": 15,
                "created_at": "2026-02-25T20:38:38.000000Z",
                "updated_at": "2026-02-25T20:38:38.000000Z"
            }
        ]
    ]
}
```

---

### GET `/api/games/{id}` – 200 OK

```json
{
    "success": true,
    "message": "Game 1 data",
    "data": {
        "id": 1,
        "title": "The Witcher 3",
        "release_year": 2015,
        "developer": "CD Projekt Red",
        "genre": "RPG",
        "score": 93,
        "price": 15,
        "created_at": "2026-02-25T20:38:38.000000Z",
        "updated_at": "2026-02-25T20:38:38.000000Z"
    }
}
```

---

### POST `/api/games` – 201 Created

```json
{
    "success": true,
    "message": "Game created successfully",
    "data": [
        {
            "id": 2,
            "title": "The Witcher 3",
            "release_year": 2015,
            "developer": "CD Projekt Red",
            "genre": "RPG",
            "score": 93,
            "price": 15,
            "created_at": "2026-03-03T08:00:00.000000Z",
            "updated_at": "2026-03-03T08:00:00.000000Z"
        }
    ]
}
```

---

### PUT `/api/games/{id}` – 200 OK

```json
{
    "success": true,
    "message": "Game updated successfully",
    "data": [
        {
            "id": 1,
            "title": "The Witcher 3: Wild Hunt",
            "release_year": 2015,
            "developer": "CD Projekt Red",
            "genre": "RPG",
            "score": 95,
            "price": 10,
            "created_at": "2026-02-25T20:38:38.000000Z",
            "updated_at": "2026-03-03T08:05:00.000000Z"
        }
    ]
}
```

---

### DELETE `/api/games/{id}` – 200 OK

```json
{
    "success": true,
    "message": "Game deleted successfully"
}
```

---

## Hibakezelés

### 422 Unprocessable Entity – Validációs hiba

Ha a POST vagy PUT/PATCH request hiányos vagy érvénytelen adatot tartalmaz, a Laravel automatikusan 422-es hibát ad vissza.

**Példa:** POST `/api/games` – hiányzó `title`, érvénytelen `genre` és `score` értékekkel

**Request Body:**
```json
{
    "release_year": 2015,
    "developer": "CD Projekt Red",
    "genre": "Horror",
    "score": 150,
    "price": 15
}
```

**Response – 422 Unprocessable Entity:**
```json
{
    "message": "The title field is required. (and 2 more errors)",
    "errors": {
        "title": [
            "The title field is required."
        ],
        "genre": [
            "The selected genre is invalid."
        ],
        "score": [
            "The score field must not be greater than 100."
        ]
    }
}
```

> **Érvényes `genre` értékek:** `Action`, `Adventure`, `RPG`, `Strategy`, `Sports`, `Simulation`, `Other`

---

### 404 Not Found – Nem létező játék

Ha a megadott `{id}`-val nem található játék az adatbázisban, a Laravel Route Model Binding automatikusan 404-es választ ad vissza.

**Példa:** GET `/api/games/999` – nem létező ID

**Response – 404 Not Found:**
```json
{
    "success": false,
    "message": "No query results for model [App\\Models\\Games] 999"
}
```

> Ez vonatkozik a `GET /api/games/{id}`, `PUT /api/games/{id}`, `PATCH /api/games/{id}` és `DELETE /api/games/{id}` endpointokra egyaránt.

---

### 500 Internal Server Error

Váratlan szerverhiba esetén az Exception üzenete kerül visszaadásra.

**Response – 500 Internal Server Error:**
```json
{
    "success": false,
    "message": "SQLSTATE[HY000]: General error: ..."
}
```
