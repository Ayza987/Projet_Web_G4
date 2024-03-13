/*
 *   Copyright (c) 2024 
 *   All rights reserved.
 */
/**
 * @file Valid_connexion.js
 * @description 
 * @author 
 * @copyright 
 */

function validateForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Vérification du mot de passe (au moins un chiffre et une majuscule)
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