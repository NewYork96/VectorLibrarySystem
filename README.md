# VectorLibrarySystem
This is a test project.

#Magyar nyelvű leírás

Ez egy teszt projekt. Egy egyszerű könyvtári cruddal kapcsolatos műveletek szerepelnek benne.
Felhasznált technológiák: PHP, JavaScript, HTML, CSS, JSON, AJAX, MVC, MSSQL, sqlsrv.

Telepítési útmutató:
1. Töltsd le a projectmappát.
2. Az Apache szerver DocumentRootja a public mappára mutasson.
3. Az Library.mdf és az Library_log.ldf fájlok a database nevű mappában találhatóak, ezeket      kell csatolni az SQL szerverhez.
4. Nyisd meg a böngésződben a DocumentRootként beállított mappát, vagy az erre mutató domaint.

Adatbázissal kapcsolatos tudnivalók:
A .env file-t a projekt főmappájával egy mappába kell helyezni.
A .env file-ban a változók a következő néven vannak elmentve:
    DB_HOST=""
    DB_NAME=""
    DB_USER=""
    DB_PASS=""
Az .env fájl beolvasásával kapcsolatos adatok config/env.php fájlban lehet módosítani.

Az adatbázis neve Library.
Egy darab tábla van neve: Books.
Mezőinformációk:
    ID ( auto increment, int)
    title (varchar)
    author (varchar)
    publishyear (int)
    isAvailable (bit, base value: 1)

Az Apache szerver DocumentRootot elég a public mappára irányítani.

A chart.png tartalmazza a program szerkezeti ábráját.