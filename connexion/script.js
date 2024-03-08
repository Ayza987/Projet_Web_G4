function submitForm(event) {
    event.preventDefault();

    // Récupérer les valeurs du formulaire
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const cesiCenter = document.getElementById('cesiCenter').value;

    // Vous pouvez traiter les données ici, par exemple les envoyer à un serveur
    console.log('Prénom:', firstName);
    console.log('Nom:', lastName);
    console.log('E-mail:', email);
    console.log('Mot de passe:', password);
    console.log('Centre CESI:', cesiCenter);
}