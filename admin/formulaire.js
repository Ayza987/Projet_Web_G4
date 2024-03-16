function openForm(userId,nomform) {
    var form = document.getElementById(nomform);
    var idInputs = form.getElementsByClassName('edit-id');
  
  // Pré-remplir tous les champs ID avec la valeur fournie
  for (var i = 0; i < idInputs.length; i++) {
    idInputs[i].value = userId;
  }
  
    // Afficher le formulaire
    form.style.display = "block";
}
  
function closeForm(nomform) {
    var form = document.getElementById(nomform);
  
    // Masquer le formulaire
    form.style.display = "none";
}
  
function deleteUser(userId) {
    // Logique pour supprimer l'utilisateur avec l'ID fourni
    console.log("Supprimer l'utilisateur avec l'ID :", userId);
}