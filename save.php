<?php

    $name = $_POST['name'];
    $email = $_POST['email'];

    savePlayerToFile($name, $email);

    // wysyłka formularza z potwierdzeniem zapisu do zapisującego
    if (sendEmail($email)) {
        // wyświetlenie komunikatu jesli poprawnie zapisano
        header('Location: success.html');
        exit;
    } else {
        // wyswietlenie komunikatu błędu
        header('Location: error.html');
        exit;
    }



    function savePlayerToFile($name, $email)
    {
        $file = fopen('players.txt', "a"); // otwarcie pliku w trybie dopisywania na końcu

        $dataToSave = $name . ';' . $email . "\n"; // przygotowanie danych do zapisu

        fwrite($file, $dataToSave); // zapis danych w pliku
        fclose($file); // zamknięcie pliku
    }


    function sendEmail($email)
    {
        $headers = '';

        $playerSubject = 'Potwierdzenia zapisu na turniej';
        $playerMessage = 'Brawo zapisałeś się na turniej FIFA';

        return mail($email, $playerSubject, $playerMessage, $headers);
    }
