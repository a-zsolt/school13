let mockData = [
  { "id": "p1",  "name": "Kék bögre",           "price": 1490, "image": "https://m.media-amazon.com/images/I/51OIsstG+6L._AC_UF894,1000_QL80_.jpg",        "stock": 24 },
  { "id": "p2",  "name": "Piros póló",          "price": 3990, "image": "shirt-red.jpg",       "stock": 15 },
  { "id": "p3",  "name": "Notebook matrica",    "price": 690,  "image": "sticker-notebook.jpg","stock": 120 },
  { "id": "p4",  "name": "Fehér bögre",         "price": 1490, "image": "mug-white.jpg",       "stock": 30 },
  { "id": "p5",  "name": "Fekete sapka",        "price": 3290, "image": "cap-black.jpg",       "stock": 18 },
  { "id": "p6",  "name": "Zöld kulacs",         "price": 2590, "image": "bottle-green.jpg",    "stock": 40 },
  { "id": "p7",  "name": "Laptop táska",        "price": 11990,"image": "laptop-bag.jpg",      "stock": 0  },
  { "id": "p8",  "name": "Egérpad",             "price": 1290, "image": "mousepad.jpg",        "stock": 75 },
  { "id": "p9",  "name": "Bluetooth fülhallgató","price": 9990,"image": "earbuds-bt.jpg",      "stock": 12 },
  { "id": "p10", "name": "Hátizsák",            "price": 8990, "image": "backpack.jpg",        "stock": 20 }
];

export function getProducts() {
  try{
    let data = mockData;

    return !Array.isArray(data) ? [] : data;
  } catch(error) {
    console.warn('[api.load] Hiba, üres tömbbel folytatodik a müvelet végzés: ', error)
    return [];
  }
}