# JavaScript
 - C alapú
 - Interpreteres nyelv
 - Gyengén típusos
    ### Változók:
    let, const, var
  
    Típusok:
    * number: egész és valós számokat tárol, Nan, végtelen+-  
    * bigint: egész számok, 64 bit, csak masik bigintel működik (szám után 'n')
    * string: szöveg, összefűzés, indexelhető 
    * boolean: t, f, 
    * undifined: ha nincs értékadás
    * null: már megszünt valami
    * symbol: speciális string, minden eleme külömböző

    ### Vezérlő szerkezet:
    Iteráció:
        - for: lépésszám addig fut amíg igaz
        - while: amíg igaz addig fut, elöl tesztel
        - do while: same, hátul
        - map: egész tömbön átmegy
        - for::in: indexeket ad vissza
        - for::of: elemeket

    Selection:
        - if: logikai eldöntés, he igaz fut
        - else: ha hamis fut
        - elseif: ha az előző hamis és ez az eldöntés igaz fut
        - switch: ha a megadott változóra igaz a feltétel fut

    ### Operátorok:
    - == értéket
    - === típust
    - !=
    - !==

    ### Array
    Olyan nem homogén adatszerkezet melynek mérete dinamikusan változik
    #### Létrehozása
    1. Literal:
        * Jelölése: `[]`
    2. Array constuctor:
        * Jelölése: `new Array()`
    #### Függvények
    1. `.push(<érték>)`: A tömb végéhez hozzáadja az új elemet, ezzel növeli a tömb méretét
    2. `.lenght()`: Visszadja a tömb méretét
    3. `.unshift(<érték>)`: Elejére betesz és vissza is adja
    4. `.shift()`: Kiveszi az első elemet és vissza is adja
    5. `.pop()`: Végéről szed ki és vissza is adja  
    6. `.splice(<kezdő i>, <törlendő db>, <beszúrandó érték>)`
    7. `.toString()`: Visszaadja stringként
    8. `.join()`: Visszaadja a megadott szeparáló characterrel 


ECMAScript - JS elődje, lassan fejlődött 

## Frameworks      Jquerey Bootstrap
 - Nyelv nehésségeinek áthidalása -> renegeteg új syntax
 - Es6 +
 - Ujragondolták a változókat methodusokat + beépített függvények

## Frontend keretrendszerek
 - Google: Angular
 - Meta: React
 - Vue JS

## Backend keretrendszerek
 - Express JS
 - Node.Js 
 - Vite
 -> önálló szerver futtatásra képesek

### Chromium - Lightweight bongésző, web alkalmazások asztaliként
 - Electron js
