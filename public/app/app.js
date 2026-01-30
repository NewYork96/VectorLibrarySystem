
function loadBooks() {

    const url = "/api/getbooks.php"

    fetch(url)
        .then(response => response.json())
        .then(result => )
}

loadBooksList() {

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