
function getBooks() {

    const url = "/api/getbooks.php"

    return fetch(url)
        .then(response => response.json())
}

function renderBookList(books) {
    const ul = document.getElementById("bookList");
    ul.innerHTML = ""; // reset

    books.forEach(books => {
        const li = document.createElement("li"); 1
        li.textContent = books.Title;
        ul.appendChild(li);
    });
}

function loadBooks() {
    getBooks()
        .then(books => {
            renderBookList(books)
        });
}

function addBook(title, author, publishYear, isAvailable) {
    const newTitle = title;
    const newAuthor = author;
    const newPublishYear = publishYear;
    const newIsAvailable = isAvailable;
    if (newTitle && newAuthor && newPublishYear && newIsAvailable) {
        const formData = new URLSearchParams({
            title: newTitle, author: newAuthor, publishYear: newPublishYear, isAvailable: newIsAvailable,
        });
        fetch('../api/addbook.php', {
            method: 'POST',
            body: formData
        }).then(loadBooks);
    }
}


function updateBook(id, title, author, publishYear, isAvailable) {
    const newTitle = prompt("Új cím:", title);
    const newAuthor = prompt("Új kiadó:", author);
    const newPublishYear = prompt("Új kiadás éve:", publishYear);
    const newIsAvailable = prompt("Új elérhetőség:", isAvailable);
    if (newTitle && newAuthor && newPublishYear && newIsAvailable) {
        const formData = new URLSearchParams({
            id, title: newTitle, author: newAuthor, publishYear: newPublishYear, isAvailable: newIsAvailable,
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

document.addEventListener("DOMContentLoaded", loadBooks);