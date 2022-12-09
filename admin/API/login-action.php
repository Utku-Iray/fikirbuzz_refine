<?php
include "../../database/connection.php";

$email = trim($_POST["email"]);
$password = trim($_POST["pwd"]);
$rememberme = trim($_POST["rememberme"]);

if (empty($email) && empty($password)) {
    $errors['error'] = "Giriş bilgileri boş bırakılamaz.";
} else {
    if (empty($email)) {
        $errors['error'] = "E-postanızı giriniz.";
    } else {
        $email = trim($email);
    }

    if (empty($password)) {
        $errors['error'] = "Şifrenizi giriniz.";
    } else {
        $password = trim($password);
    }
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
}
if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $sql = "SELECT * FROM user WHERE email = :userEmail AND status = 1 AND (role = 'editor' OR role = 'admin')";

    if ($stmt = $vt->prepare($sql)) {

        $stmt->bindParam(":userEmail", $param_email, PDO::PARAM_STR);


        $param_email = trim($email);

        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                if ($row = $stmt->fetch()) {
                    $id = $row["id"];
                    $email = $row["email"];
                    $fullname = $row["name"];
                    $role = $row["role"];
                    $hashed_password = $row["password"];
                    if (password_verify($password, $hashed_password)) {

                        if ($rememberme == true) {
                            setcookie("loginController", "1", time() + 3600 * 24 * 7, "/");
                            setcookie("email", $email, time() + 3600 * 24 * 7, "/");
                            setcookie("fullname", $fullname, time() + 3600 * 24 * 7, "/");
                            setcookie("role", $role, time() + 3600 * 24 * 7, "/");
                        } else {
                            setcookie("loginController", "1", time() + 86400, "/");
                            setcookie("email", $email, time() + 86400, "/");
                            setcookie("fullname", $fullname, time() + 86400, "/");
                            setcookie("role", $role, time() + 86400, "/");
                        }

                        $form_data['status'] = true;
                        $form_data['successful'] = "Giriş işlemi başarılı. Panele yönlendiriliyorsunuz.";
                    } else {
                        // Display an error message if password is not valid
                        $errors['error'] = "Şifrenizi kontrol ediniz.";
                        $form_data['status'] = false;
                        $form_data['errors'] = $errors;
                    }
                }
            } else {
                $errors['error'] = "Giriş yetkiniz bulunmamaktadır.";
                $form_data['status'] = false;
                $form_data['errors'] = $errors;
            }
        } else {
            $errors['error'] = "Oops! Birşeyler yanlış gidiyor. Lütfen daha sonra tekrar deneyiniz.";
            $form_data['status'] = false;
            $form_data['errors'] = $errors;
        }

        // Close statement
        unset($stmt);
    }
}
echo json_encode($form_data);

unset($vt);
