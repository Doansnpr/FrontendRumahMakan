<?php
$recaptchaSecret = "6Lc6ezsoAAAAAElqiDFEharylW6Cf9GnbO2mzEhu";

if (isset($_POST['g-recaptcha-response'])) {
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaData = [
        'secret' => $recaptchaSecret,
        'response' => $recaptchaResponse,
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptchaData),
        ],
    ];

    $context = stream_context_create($options);
    $recaptchaResult = file_get_contents($recaptchaUrl, false, $context);
    $recaptchaJson = json_decode($recaptchaResult);

    if ($recaptchaJson && $recaptchaJson->success) {
        	session_start();

			require 'admin/config.php';
			    if ($_SERVER["REQUEST_METHOD"] == "POST") {
			    $username = $_POST["username"];
			    $password = $_POST["password"];

			    // Membuat prepared statement
			    $stmt = $conn->prepare("SELECT id_user FROM user WHERE username = ? AND password = ?");
			    $stmt->bind_param("ss", $username, $password);
			    $stmt->execute();
			    $stmt->store_result();

			    if ($stmt->num_rows == 1) {
			        $_SESSION['username'] = $username;
			        header("location: admin/index.php");
			    } else {
			        echo "<script>alert('Masukkan username dan password dengan benar!'); window.location = 'login.php'</script>"; 
			    }

			    $stmt->close();
			}
    } else {
        header("Location: login.php?error=captchaError");
        exit();
    }
} else {
    echo "reCAPTCHA tidak ditemukan. Silakan coba lagi.";
}
?>