<?php
require "../database/connection.php";
require "controller.php";

$query = $vt->prepare("SELECT * FROM general WHERE g_page_url='pcb-design'");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | PCB Design & Manufacturing</title>
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
                            <h2><strong>Refine Admin | </strong> PCB Design & Manufacturing</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix g-3 mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="updatePCBForm" name="updatePCBForm" method="post" enctype="multipart/form-data">
                                <!-- Blog Content -->
                                <label for="ckeditor" class="mb-1">İçerik</label>
                                <div class="form-group mb-3">
                                    <textarea id="ckeditor" name="ckeditor"><?= $result[0]->g_main_content_en ?></textarea>
                                </div>

                                <div style="text-align: right !important">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5">GÜNCELLE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>

    <script>
        $(function() {
            //CKEditor
            CKEDITOR.replace('ckeditor');
            CKEDITOR.config.height = 400;

        });
    </script>

    <!-- Update PCB -->
    <script>
        $('#updatePCBForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            var ckeditordata = CKEDITOR.instances['ckeditor'].getData();

            $data.append("ckeditordata", ckeditordata)

            Swal.fire({
                title: 'İçeriği güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/update-pcb-design.php",
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
                            }
                        }
                    });
                }
            })
        });
    </script>

</body>

</html>