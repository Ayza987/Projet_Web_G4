function submitForm(event) {
    event.preventDefault();

    // Récupérer les valeurs du formulaire
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    

    // Vous pouvez traiter les données ici, par exemple les envoyer à un serveur
    
    console.log('E-mail:', email);
    console.log('Mot de passe:', password);
    
}