# VectorLibrarySystem
This is a test project.

#Magyar nyelvű leírás

Ez egy teszt projekt.
Felhasznált technológiák: PHP, JavaScript, HTML, CSS, JSON, AJAX, MVC, MSSQL, sqlsrv.

Konfiguráció:
    A .env file-t a projekt főmappájával egy mappába kell helyezni.
    
    A .env file-ban a változók a következő néven vannak elmentve:
        DB_HOST=""
        DB_NAME=""
        DB_USER=""
        DB_PASS=""
    
    Az .env fájl beolvasásával kapcsolatos adatok config/env.php fájlban lehet módosítani.

    Az adatbázis neve Library.
    Egy darab tábla vann neve: Books.
    Mezőinformációk:
        ID (index, auto encrement, int)
        title (varchar)
        author (varchar)
        publishyear (int)
        isAvailable (bit, base value: 1)

    Az Apache szervernél elég, ha a DocumentRoot csak public mappára van irányítva.

Az ábra.png tartalmazza a program szerkeketi ábráját.