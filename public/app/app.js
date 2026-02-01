

function showCreateForm() {
    let createForm = document.getElementById("create")
    let display = window.getComputedStyle(createForm).display;

    if (display == "none") {
        createForm.style.display = "block"
    } else {
        createForm.style.display = "none"
    }
}

function getBooks() {

    const url = "/api/getbooks.php"

    return fetch(url)
        .then(response => response.json())
}

function renderBookList(books) {
    const ul = document.getElementById("bookList");
    ul.innerHTML = "";

    books.forEach(book => {
        const li = document.createElement("li");

        li.innerHTML = `
            <span>Cím: ${book.Title}</span>
            <span>Író: ${book.Author}</span>
            <span>Kiadás éve: ${book.PublishYear}</span>
            <span>Elérhető: ${book.IsAvailable === 1 ? "Igen" : "Nem"}</span>
            <button
                onclick="updateBook(${book.ID}, '${book.Title}', '${book.Author}', ${book.PublishYear})">
                Módosítás
            </button>
            <button
                onclick="deleteBook(${book.ID})">
                Törlés
            </button>
        `;
        ul.appendChild(li);
    });
}

function loadBooks() {
    getBooks()
        .then(books => {
            renderBookList(books)
        });
}
function handleBookFormSubmit() {
    document.getElementById('book-form').addEventListener('submit', e => {
        e.preventDefault();
        const formData = new FormData(e.target);

        fetch('../api/addbook.php', {
            method: 'POST',
            body: formData
        }).then(loadBooks);
    });
}
function updateBook(id, title, author, publishYear, isAvailable) {
    const newTitle = prompt("Új cím:", title);
    const newAuthor = prompt("Új iró:", author);
    const newPublishYear = prompt("Új kiadás éve:", publishYear);
    if (newTitle && newAuthor && newPublishYear) {
        const formData = new URLSearchParams({
            id, title: newTitle, author: newAuthor, publishYear: newPublishYear
        });
        fetch('../api/updatebook.php', {
            method: 'POST',
            body: formData
        }).then(loadBooks);
    }
}


function deleteBook(id) {
    const formData = new URLSearchParams({ id });
    fetch('../api/deletebook.php', {
        method: 'POST',
        body: formData
    }).then(loadBooks);
}

document.addEventListener("DOMContentLoaded", loadBooks(), handleBookFormSubmit());