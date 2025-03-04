<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rejestracja</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      text-align: center;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 50%;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    h2 {
      color: #333;
    }

    label,
    input {
      display: block;
      width: 100%;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="submit"] {
      background: #28a745;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background: #218838;
    }

    .nav {
      background: #333;
      padding: 10px;
      text-align: center;
    }

    .nav a {
      color: white;
      margin: 0 15px;
      text-decoration: none;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <div class="nav">
    <a href="index.php">Rejestracja</a>
    <a href="users.php">Lista Użytkowników</a>
  </div>
  <div class="container">
    <h2>Formularz rejestracji</h2>
    <form method="POST">
      <label>Imię:</label>
      <input type="text" name="imie" required>

      <label>Nazwisko:</label>
      <input type="text" name="nazwisko" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Hasło:</label>
      <input type="password" name="haslo" required>

      <label>Powtórz hasło:</label>
      <input type="password" name="haslo2" required>

      <input type="submit" name="submit" value="Zarejestruj">
    </form>
  </div>

  <?php
  if (isset($_POST['submit'])) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];


    $polaczenie = mysqli_connect("localhost", "root", "", "formularz");


    if (!$polaczenie) {
      die("blad polaczenia z baza danych");
    }
    if ($haslo !== $haslo2) {
      die("Hasła nie są identyczne!");
    }
    $sql = "INSERT INTO users (imie, nazwisko, email, haslo) VALUES ('$imie', '$nazwisko', '$email', '$haslo2')";


    if (mysqli_query($polaczenie, $sql)) {
      echo "Resjestracja zakończona sukcesem";
    } else {
      echo "błąd rejestracji";
    }


    mysqli_close($polaczenie);
  }
  ?>
  <!-- mysqli_connect
mysqli_connect_error
mysqli_query
mysqli_error
mysqli_close]
mysqli_connect(host, user, password, database) – Nawiązuje połączenie z bazą danych MySQL.
mysqli_connect_error() – Zwraca komunikat błędu, jeśli połączenie z bazą danych nie powiodło się.
mysqli_query($conn, $sql) – Wykonuje zapytanie SQL na podanym połączeniu z bazą danych.
mysqli_error($conn) – Zwraca opis ostatniego błędu występującego w danym połączeniu z MySQL.
mysqli_close($conn) – Zamyka połączenie z bazą danych. -->

  <!-- 
CREATE DATABASE formularz;

USE formularz;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    haslo VARCHAR(255) NOT NULL
); -->
</body>

</html>
