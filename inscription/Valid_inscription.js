/*
 *   Copyright (c) 2024 
 *   All rights reserved.
 */
/**
 * @file Valid_form.js
 * @description 
 * @author Denise
 * @copyright 
 */

   function validateForm() {
    const prenom = document.getElementById('prenom').value;
    const nom = document.getElementById('nom').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Vérification du prénom et du nom
    const nameRegex = /^[a-zA-Z\s]*$/;
    if (!nameRegex.test(prenom) || !nameRegex.test(nom)) {
        alert("Le prénom et le nom ne doivent contenir que des lettres et des espaces.");
        return false;
    }

    // Vérification du mot de passe
    const passwordRegex = /^(?=.*\d)(?=.*[A-Z]).{8,}$/;
    if (!passwordRegex.test(password)) {
        alert("Le mot de passe doit comporter au moins 8 caractères, dont au moins un chiffre et une majuscule.");
        return false;
    }

      // Vérification du format de l'email
      const emailRegex = /^[a-zA-Z]+\.[a-zA-Z]+@ucac-icam\.com$/;
      if (!emailRegex.test(email)) {
          alert("L'email n'est pas au bon format");
          return false;
      }

    return true; 
}
