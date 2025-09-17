# Object

    Az Object a nyelv alapvető rekord-/szótár-típusa, amely tulajdonságokat tárol kulcs–érték formában, és a kulcsok típusa csak string vagy symbol lehet, miközben az öröklődést a prototípuslánc biztosítja.

    Alapértelmezetten nem közvetlenül iterálható, nincs beépített size tulajdonsága, és vannak “alapértelmezett” (örökölt) kulcsai a prototípusból, ami különbözik a Map viselkedésétől.

# Map

    A Map kulcs–érték párok rendezett kollekciója, ahol a kulcs bármi lehet (primitív vagy objektum), és a kulcsok beillesztési sorrendje megmarad.

    Főbb metódusok és tulajdonságok: set, get, has, delete, clear, size, keys, values, entries, forEach; különlegesség, hogy a NaN kulcsok egymással ekvivalensek a Map-ben.

# Set

    A Set egyedi értékek gyűjteménye, amely minden elemet legfeljebb egyszer tartalmaz, és az iterálás beillesztési sorrendben történik.

    Főbb metódusok és tulajdonságok: add, has, delete, clear, size; tipikus használat a duplikátumok eltávolítása vagy tagság gyors ellenőrzése.

