
//A regisztrációs űrlap megjelenítése
function showCreateForm() {
    let createForm = document.getElementById("create")
    let display = window.getComputedStyle(createForm).display; //Aktuális display érték lekérése.

    //A jelenlegi értéktől függő display érték beállítása
    if (display == "none") {
        createForm.style.display = "grid"
    } else {
        createForm.style.display = "none"
    }
}

//könyvek adatainak lekérdezése
function getBooks() {

    const url = "/api/getbooks.php"
    //adatok fogadása
    return fetch(url)
        .then(response => response.json())
}

//könyvlista megjelenítése
function renderBookList(books) {
    const ul = document.getElementById("bookList");
    ul.innerHTML = "";
    //az új html lista létrehozása
    books.forEach(book => {
        const li = document.createElement("li");

        li.innerHTML = `
            <span>Cím: ${book.Title}</span>
            <span>Író: ${book.Author}</span>
            <span>Kiadás éve: ${book.PublishYear}</span>
            <span>Kölcsönözhető: ${book.IsAvailable == 1 ? "Igen" : "Nem"}</span>
            <div class="fnbuttons">
                <button
                    onclick="updateBook(${book.ID}, '${book.Title}', '${book.Author}', ${book.PublishYear})">
                    Módosítás
                </button>
                <button
                    onclick="deleteBook(${book.ID})">
                    Törlés
                </button>
            </div>
        `;
        ul.appendChild(li);
    });
}

//a kapott könyvadatok továbbítása a könyvlista legenerálásához
function loadBooks() {
    getBooks()
        .then(books => {
            renderBookList(books)
        });
}

//a könyv regisztrációs adatainak átadása
function handleBookFormSubmit() {
    //az alapértelmezett submit fn kikapcsolása ész adatok begyüjtése
    document.getElementById('book-form').addEventListener('submit', e => {
        e.preventDefault();
        const formData = new FormData(e.target);
        //adatok átadása
        fetch('../api/addbook.php', {
            method: 'POST',
            body: formData
        }).then(loadBooks);
    });
}

//könyvadatok frissítése
function updateBook(id, title, author, publishYear, isAvailable) {
    //adatok bekérése
    const newTitle = prompt("Új cím:", title);
    const newAuthor = prompt("Új iró:", author);
    const newPublishYear = prompt("Új kiadás éve:", publishYear);
    const newIsAvailable = prompt("Elérhető? (1 = igen, 0 = nem):", isAvailable);
    //adatok mentése
    if (id && newTitle && newAuthor && newPublishYear && newIsAvailable) {
        const formData = new URLSearchParams({
            id, title: newTitle, author: newAuthor, publishYear: newPublishYear, isAvailable: newIsAvailable
        });
        //adatok átadása
        fetch('../api/updatebook.php', {
            method: 'POST',
            body: formData
        }).then(loadBooks);
    }
}

//könyv törlése
function deleteBook(id) {
    //adatok mentése
    const formData = new URLSearchParams({ id });
    //adatok átadása
    fetch('../api/deletebook.php', {
        method: 'POST',
        body: formData
    }).then(loadBooks);
}

document.addEventListener("DOMContentLoaded", loadBooks(), handleBookFormSubmit());