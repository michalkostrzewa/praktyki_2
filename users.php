<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista Użytkowników</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      text-align: center;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 60%;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background: #333;
      color: white;
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

    input[type="text"] {
      padding: 8px;
      width: 80%;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="submit"] {
      background: #007bff;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <div class="nav">
    <a href="index.php">Rejestracja</a>
    <a href="users.php">Lista Użytkowników</a>
  </div>

  <div class="container">
    <h2>Lista Użytkowników</h2>
    <form method="GET">
      <input type="text" name="search" placeholder="Szukaj po imieniu">
      <input type="submit" value="Szukaj">
    </form>

    <?php
    $polaczenie = mysqli_connect("localhost", "root", "", "formularz");

    if (!$polaczenie) {
      die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }

    // $search = isset($_GET['search']) ? mysqli_real_escape_string($polaczenie, $_GET['search']) : '';
    $search = $_GET['search'] ?? "";

    $sql = "SELECT * FROM users";
    if ($search) {
      $sql .= " WHERE imie LIKE '%$search%'";
    }

    $result = mysqli_query($polaczenie, $sql);

    echo "<table><tr><th>Imię</th><th>Nazwisko</th><th>Email</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>{$row['imie']}</td><td>{$row['nazwisko']}</td><td>{$row['email']}</td></tr>";
    }
    echo "</table>";
    //mysqli_fetch_assoc($result) pobiera jeden wiersz wyników jako tablicę asocjacyjną
    // $row = [
    //   "imie" => "Jan",
    //   "nazwisko" => "Kowalski",
    //   "email" => "jan@example.com"
    // ];
    mysqli_close($polaczenie);
    ?>
  </div>

</body>

</html>
