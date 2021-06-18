var inputBar = document.getElementById("search-bar-input");

function searchBar() {
    window.location.replace(`http://127.0.0.1:3000/pesquisa/${inputBar.value}`);
}
