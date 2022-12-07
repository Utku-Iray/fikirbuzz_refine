<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | Yeni Ana Kategori Ekle</title>
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
                            <h2><strong>Refine Admin | </strong>Yeni Ana Kategori Ekle</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3 mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="addNewProductMainCategory" name="addNewProductMainCategory" method="post" enctype="multipart/form-data">

                                <!-- Product Main Category Name -->
                                <label for="productCatName" class="mb-1">Ana Kategori Adı</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="productCatName" name="productCatName" class="form-control" placeholder="Ana kategori adını giriniz">
                                </div>

                                <label for="prodCatStatus" class="mb-1">Ana Kategori Durum</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="prodCatStatus" name="prodCatStatus" aria-describedby="catStatusHelp">
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                    <small for="catStatusHelp">* Kategori durumu aktif ise alt kategori eklenebilir ve websitede erişilebilir olacaktır.</small>
                                </div>

                                <!-- Product Main Category Image -->
                                <!-- <label for="prodCatImage" class="mb-1">Fotoğraf</label>
                                <div class="form-group mb-2">
                                    <input type="file" class="form-control-file" id="prodCatImage" name="prodCatImage" accept="image/png" aria-describedby="fileHelp">
                                    <small for="fileHelp">Fotoğraf türü PNG olmalıdır.</small>
                                </div> -->

                                <div style="text-align: right !important">
                                    <input type="text" id="userNameInput" name="userNameInput" class="d-none" value="admin">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5 ">EKLE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php include "utility/script.php"; ?>

    <!-- Create new Blog Category -->
    <script>
        $('#addNewProductMainCategory').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            Swal.fire({
                title: 'Ana kategoriyi eklemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/create-prod-main-cat.php",
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
                                setInterval(location.href = "product-category.php", 3000);

                            }
                        }
                    });
                }
            })
        });
    </script>
</body>

</html>