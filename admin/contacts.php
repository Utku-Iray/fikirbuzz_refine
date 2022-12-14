<?php
require "../database/connection.php";
require "controller.php";

$query = $vt->prepare("SELECT * FROM contact");
$query->execute();
$contactResult = $query->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | İletişim Bilgileri</title>
</head>

<body data-alpino="theme-purple">

    <?php include "utility/header.php" ?>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header d-flex justify-content-between">
                            <h2><strong>Refine Admin |</strong> İletişim Bilgileri</h2>

                            <!-- <a href="add-new-contact.php" class="btn btn-primary"> <strong>Yeni Ekle</strong></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Başlık</th>
                                            <th>E-posta</th>
                                            <th>Durum</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($contactResult as $singleResult) { ?>
                                            <tr class="contact-<?= $singleResult->contact_id ?>">
                                                <td><?= $singleResult->contact_title ?></td>
                                                <td><?= $singleResult->contact_mail ?></td>
                                                <td><?= $singleResult->contact_status ?></td>
                                                <td class="text-center"><a href="contact-details.php?contactid=<?= $singleResult->contact_id ?>" class="btn btn-info">DÜZENLE</a></td>
                                                <td class="text-center"><button class="btn btn-danger contactDeleteBtn" contact-id="<?= $singleResult->contact_id ?>">SİL</button></td>
                                            </tr>
                                        <?php }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>
    <!-- Delete Contact -->
    <script>
        $(document).on('click', '.contactDeleteBtn', function() {
            event.preventDefault();
            var contactID = $(this).attr("contact-id");

            Swal.fire({
                title: 'İletişim bilgisini silmek istediğinize emin misiniz?',
                text: "Not: Geri dönüşü olmayacaktır. Tekrar eklemek zorunda kalabilirsiniz.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#18ce0f",
                cancelButtonColor: "#FF3636",
                confirmButtonText: 'Evet, eminim!',
                cancelButtonText: 'Vazgeç',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/delete-contact.php",
                        type: "POST",
                        data: {
                            contactID: contactID
                        },
                        cache: false,
                        dataType: "json",
                        success: function(data) {
                            if (data.status == true) {
                                setInterval(reloadHandler, 2000)
                                $(".contact-" + contactID).fadeOut('slow');
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                        }
                    });
                }
            })
        });
    </script>

</body>

</html>