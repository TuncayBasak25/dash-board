<?php

class UserController{

  public static function signup($username, $password, $password_repeat, $email, $firstname, $lastname, $adress, $city, $postalcode){

    $userModel = new UserModel();
    $userModel->add_user($username, $email, $password, $firstname, $lastname, $adress,$city, $postalcode);

    //USERNAME
    if (empty($username) === TRUE) {
      echo "Veuillez entrer un nom d'utilisateur.";
      return FALSE;
    }

    if (strlen($username) < 4) {
      echo "Le nom d'utilisateur ne comporte pas suffisament de caractères. Veuillez entrer au moins 4 caractères";
      return FALSE;
    }

    if (strlen($username) > 30) {
      echo "Le nom d'utilisateur comporte un trop grand nombre de caractères. Veullez entrer moins de 30 caractères";
      return FALSE;
    }

    $allowed = ["_", "-"];
    $cache_username = str_replace($allowed, '', $username);
    if (!ctype_alnum($cache_username) === TRUE) {
      echo "Le nom d'utilisateur ne peut comporter que les caractères spéciaux suivant: " . '"-" ou "_".';
    }

    if ($username === $userModel->get_user($username)) {
      echo "Le nom d'utilisateur est déjà utilisé. Veuillez choisir un autre nom d'utilisateur.";
      return FALSE;
    }

    //PASSWORD
    if (empty($password) === TRUE) {
      echo "Veuillez entrer un mot de passe.";
      return FALSE;
    }

    if (strlen($password) < 6) {
      echo "Le mot de passe ne comporte pas suffisament de caractères. Veuillez entrer au moins 4 caractères";
      return FALSE;
    }

    //PASSWORD REPEAT
    if (empty($password_repeat) === TRUE) {
      echo "Veuillez remplir le champ de confirmation du mot de passe.";
      return FALSE;
    }

    if ($password_repeat !== $password) {
      echo "Le champ de confirmation de mot de passe ne correspond pas au mot de passe précédemment composer.";
      return FALSE;
    }

    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    //MAIL
    if (empty($email) === TRUE) {
      echo "Veuillez entrer une adresse mail.";
      return FALSE;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === TRUE){
      echo "L'adresse mail saisie n'est pas valide.";
    }

    //FIRSTNAME
    if (empty($firstname) === TRUE) {
      echo "Veuillez entrer votre prénom.";
      return FALSE;
    }

    if (!ctype_alpha($firstname) === TRUE) {
      echo "Le champ prénom ne peux contenir que des caractères alphabétique.";
      return FALSE;
    }

    if (strlen($firstname) > 30) {
      echo "Le champ prénom ne peux contenir plus de 30 caractères.";
    }

    //LASTNAME
    if (empty($lastname) === TRUE) {
      echo "Veuillez entrer votre nom.";
      return FALSE;
    }

    if (!ctype_alpha($lastname) === TRUE) {
      echo "Le champ nom ne peux contenir que des caractères alphabétique.";
      return FALSE;
    }

    if (strlen($lastname) > 30) {
      echo "Le champ nom ne peux contenir plus de 30 caractères.";
      return FALSE;
    }

    //ADRESS
    if (empty($adress) === TRUE) {
        echo "Veuillez entrer votre adresse.";
        return FALSE;
    }

    if (!preg_match('/^[a-z0-9 .\-]+$/i', $adress)) {
      echo "Vous ne pouvez saisir que des caractères alphanumérique ainsi que des espaces dans le champ adresse.";
      return FALSE;
    }

    //CITY
    if (empty($city) === TRUE) {
      echo "Veuillez entrer votre ville.";
      return FALSE;
    }

    if (!ctype_alpha($city) === TRUE) {
      echo "Vous ne pouvez entrer que des caractères alphabétiques dans le champ ville. ";
      return FALSE;
    }

    //POSTALCODE
    if (empty($postalcode) === TRUE) {
      echo "Veuillez entrer votre code postal.";
      return FALSE;
    }

    if (!ctype_digit($postalcode) === TRUE) {
      echo "Vous ne pouvez entrer que des caractères numériques dans le champ code postal. ";
      return FALSE;
    }
    if (!strlen($postalcode) === 5) {
      echo "Votre code postal de peut pas comporeter plus de 5 chiffres.";
      return FALSE;
    }

    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    return TRUE;

    var_dump($_POST['username']);
  }
}
