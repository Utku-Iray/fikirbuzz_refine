<?php
require "../database/connection.php";
require "controller.php";

if (isset($_GET["contactid"])) {
    $contactID = $_GET["contactid"];
    $query = $vt->prepare("SELECT * FROM contact WHERE contact_id='$contactID'");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
} else {
    header("Location: contacts.php");
}



?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | İletişim Bilgisi Düzenle</title>
</head>

<body data-alpino="theme-purple">

    <?php include "utility/header.php" ?>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Refine Admin | </strong>İletişim Bilgisi Düzenle</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3 mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="updateContactInfo" name="updateContactInfo" method="post" enctype="multipart/form-data">

                                <!-- Contact Info Title -->
                                <label for="contactTitle" class="mb-1">Başlık *</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="contactTitle" name="contactTitle" class="form-control" placeholder="Başlık" value="<?= $result[0]->contact_title ?>">
                                </div>

                                <!-- Contact Info Address -->
                                <label for="contactAddress" class="mb-1">Adresi *</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="contactAddress" name="contactAddress" class="form-control" placeholder="Adres" value="<?= $result[0]->contact_address ?>">
                                </div>

                                <!-- Contact Info E-mail -->
                                <label for="contactMail" class="mb-1">E-posta *</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="contactMail" name="contactMail" class="form-control" placeholder="E-posta" value="<?= $result[0]->contact_mail ?>">
                                </div>

                                <!-- Contact Info Phone -->
                                <label for="contactPhone" class="mb-1">Telefon *</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="contactPhone" name="contactPhone" class="form-control" placeholder="Telefon" value="<?= $result[0]->contact_phone ?>">
                                </div>

                                <!-- Contact Info Phone -->
                                <label for="contactMaps" class="mb-1">Google Maps Linki</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="contactMaps" name="contactMaps" class="form-control" placeholder="Google Maps Linki" value="<?= $result[0]->contact_maps ?>" aria-describedby="contactMapsHelp">
                                    <small for="contactMapsHelp">
                                        Sitenizde bulunan adrese tıklandığında harita üstünde açılmasını istiyorsanız bu alanı doldurunuz.<br>
                                        <strong> Linki doğru kopyalamak için sırasıyla yapmanız gerekenler:<br></strong>
                                        - Google maps üzerinden görünmesini istediğiniz lokasyona tıklayınız.<br>
                                        - Sol tarafta açılan alanda "PAYLAŞ" butonuna tıklayınız.<br>
                                        - Açılan ekran üzerinde bulunan bağlantıyı kopyalayıp bu alana yapıştırınız.
                                    </small>
                                </div>

                                <label for="contactStatus" class="mb-1">İletişim Bilgisi Durum</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="contactStatus" name="contactStatus" aria-describedby="contactStatusHelp">
                                        <option value="1" <?php if ($result[0]->contact_status == 1) echo "selected" ?>>Aktif</option>
                                        <option value="0" <?php if ($result[0]->contact_status == 0) echo "selected" ?>>Pasif</option>
                                    </select>
                                </div>

                                <div style="text-align: right !important">
                                    <input type="text" id="idHolderInput" name="idHolderInput" class="d-none" value="<?= $result[0]->contact_id ?>">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5 ">GÜNCELLE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php include "utility/script.php"; ?>

    <!-- Update Contact -->
    <script>
        $('#updateContactInfo').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            Swal.fire({
                title: 'İletişim bilgisini güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/update-contact.php",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: "json",
                        data: $data,
                        success: function(data) {
                            if (data.status == false) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data.errors.error,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.success,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                setInterval(location.href = "contacts.php", 3500);

                            }
                        }
                    });
                }
            })
        });
    </script>
</body>

</html>