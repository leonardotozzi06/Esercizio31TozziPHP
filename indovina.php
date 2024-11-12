<?php
session_start();

// Verifica se la sessione è già stata avviata e inizializza le variabili di gioco
if (!isset($_SESSION['tentativi'])) {
    $_SESSION['tentativi'] = 0;
    $_SESSION['indovinati'] = 0;
}

// Controllo se è stato inviato un numero dall'utente
if (isset($_GET['numero'])) {
    $numero_utente = (int) $_GET['numero'];  // Converte il numero inviato dall'utente
} else {
    // Se non è stato inviato un numero, mostra un messaggio di errore
    die('Numero non valido');
}


// Genera un numero casuale tra 1 e 20
$numero_casuale = mt_rand(1, 20); // Genera un numero intero tra 1 e 20

// Incrementa i tentativi
$_SESSION['tentativi']++;

// Verifica se l'utente ha indovinato
if ($numero_utente == $numero_casuale) {
    $_SESSION['indovinati']++;  // Incrementa il conteggio degli indovinati
    $messaggio = "Hai indovinato!";
} else {    
    $messaggio = "Non hai indovinato. Riprova!";
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato del Gioco</title>
</head>
<body>
    <h1>Risultato del Gioco</h1>

    <p><strong>Numero casuale generato:</strong> <?php echo $numero_casuale; ?></p>
    <p><strong>Numero scelto dall'utente:</strong> <?php echo $numero_utente; ?></p>

    <p><?php echo $messaggio; ?></p>

    <p><strong>Tentativi totali:</strong> <?php echo $_SESSION['tentativi']; ?></p>
    <p><strong>Indovinati:</strong> <?php echo $_SESSION['indovinati']; ?></p>

    <br>
    <a href="scelta.html">Prova un altro tentativo</a>
</body>
</html>
