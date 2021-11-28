function ValidForm() {
    let form = document.getElementsByName('form');

    form.addEventListener('submit', function(e) {
        let auteur = document.getElementById('auteur');

        if (auteur.value.trim() === "") {
            let myError = document.getElementById('error');
            myError.innerHTML = "Veuillez remplir le champs"

            e.preventDefault()
        }
    })
}