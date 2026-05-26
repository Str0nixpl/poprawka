<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "kontakt@busbros.pl";
    $name = strip_tags(trim($_POST["name"]));
    $phone = strip_tags(trim($_POST["phone"]));
    $service = strip_tags(trim($_POST["service"]));
    $message = strip_tags(trim($_POST["message"]));
    
    $subject = "Nowe zapytanie BusBros: " . ($service ? $service : "Ogólne");
    
    $email_content = "Imię i nazwisko: $name\n";
    $email_content .= "Telefon: $phone\n";
    $email_content .= "Usługa: $service\n\n";
    $email_content .= "Wiadomość:\n$message\n";
    
    $headers = "From: Formularz BusBros <kontakt@busbros.pl>\r\n";
    $headers .= "Reply-To: kontakt@busbros.pl\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    if (mail($to, $subject, $email_content, $headers)) {
        echo "<script>alert('Wiadomość wysłana pomyślnie!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Błąd wysyłania. Spróbuj ponownie lub zadzwoń.'); window.location.href='index.html';</script>";
    }
} else {
    header("Location: index.html");
}
?>