<?php $page="Liste Auteurs" ?>
<?php
include("bd.php");
$sql = "SELECT *
FROM auteurs;
";
$result = $pdo->query($sql);
$auteurs = $result ->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">

<!-- BEGIN: head -->

<?php include("component/head.php")?>
<!-- END: head -->

<body class="p-4">
    <div class="container-fluid">
        <div class="row">
            <!-- BEGIN: Side Menu -->

            <?php include("component/sidemenu.php")?>

            <!-- END: Side Menu -->
            <div class="col pt-2 bg-content rounded-5">
                <div class="">
                    <h2></h2>
                </div>
                <div class="content">
                    <div class="px-2">
                        <h2 class="mt-4 fw-medium fs-5">List Auteurs</h2>
                    </div>
                    <!-- BEGIN: Chercher Menu -->
                    <div class="d-flex px-2 mt-4">
                        <input type="text" class="form-control me-2" placeholder="Chercher">
                        <button class="btn btn-primary">Chercher</button>

                    </div>
                    <!-- END: Chercher Menu -->
                    <div class="my-5">
                        <div class="container-md">
                            <div class="bg-white rounded-3 ">
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Liste de Auteurs</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    
                   
                                    <div
                                        class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">
                                        <?php foreach($auteurs as $index => $auteur){  ?>

                                        <div class="col">
                                            <div class="card">
                                                <img src="<?= $auteur->auteur_img;?>" class="card-img-top"
                                                    alt="<?= $auteur->nom; ?>">
                                                <div class="card-body">
                                                    <h6 class="card-title">
                                                        <?= $auteur->nom;?>
                                                    </h6>
                                                    
                                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#modal-<?= $index; ?>">Details</button>
                                                        <button class="btn btn-sm btn-warning mb-2 me-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#editModal-<?= $index; ?>">Modifier</button>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-<?= $index; ?>" tabindex="-1" aria-labelledby="modalLabel-<?= $index; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="modalLabel-<?= $index; ?>">
                                                            <?= htmlspecialchars($auteur->nom); ?>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-12 col-md-4 col-lg-3 ">
                                                                    <img src="<?= htmlspecialchars($auteur->auteur_img); ?>" alt="" class="w-md-100 w-sm-50">
                                                                </div>
                                                                <div class="col">
                                                                    <h1><?= htmlspecialchars($auteur->nom); ?></h1>
                                                                    <p><?= htmlspecialchars($auteur->bio); ?></p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal fade" id="editModal-<?= $index; ?>" tabindex="-1" aria-labelledby="editModalLabel-<?= $index; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel-<?= $index; ?>">تعديل معلومات الكتاب</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="update_livre.php" method="POST">
                                                            <input type="hidden" name="id_auteur" value="<?= $auteur->id_auteur; ?>">

                                                            <div class="mb-3">
                                                                <label for="auteur-<?= $index; ?>" class="form-label">عنوان الكتاب</label>
                                                                <input type="text" class="form-control" id="auteur-<?= $index; ?>" name="auteur"
                                                                    value="<?= $auteur->nom; ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="bio-<?= $index; ?>" class="form-label">وصف الكتاب</label>
                                                                <textarea class="form-control" id="bio-<?= $index; ?>" name="bio" rows="7"
                                                                        required><?= $auteur->bio; ?></textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="img-<?= $index; ?>" class="form-label">رابط الصورة</label>
                                                                <input type="file" name="file" class="form-control" id="img-<?= $index; ?>" >
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="décédé-choise">Est-il décédé ou non ?</label>
                                                                <select id="décédé-choise" type="text" class="form-control">
                                                                    <option value="" selected disabled>Choise etat</option>
                                                                    <option value="1">décédé</option>
                                                                    <option value="2">non</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="Date_De_Naissance-<?= $index; ?>">Date De Naissance (seulement l'année)</label>
                                                                <input id="Date_De_Naissance-<?= $index; ?>" type="text" class="form-control" name="" value="<?= $auteur->naissance; ?>" >
                                                            </div>
                                                            <!-- تعديل الصورة -->
                                                            <div class="mb-3">
                                                                <label class="form-label" for="décédé>">Date De décédé (seulement l'année)</label>
                                                                <input id="décédé" type="text" class="form-control" name="" value="<?= $auteur->decide; ?>" >
                                                            </div>

                                                            

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php } ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
                integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
                crossorigin="anonymous"></script>
                <!-- <script>document.addEventListener("DOMContentLoaded", function() {
                const typeSelect = document.getElementById('décédé-choise');
                const etat = document.getElementById('décédé');

                function toggleEtatField() {
                    if (typeSelect.value === '2') { 
                        etat.setAttribute("disabled", "");
                        etat.style.cursor ="not-allowed";
                    } else {
                        etat.removeAttribute("disabled");
                        etat.style.cursor ="auto";
                        
                    }
                }

                // Add event listener to typeSelect
                typeSelect.addEventListener('change', toggleEtatField);

                // Run on page load
                toggleEtatField();
            });</script> -->
            <script>document.addEventListener("DOMContentLoaded", function () {
    const modals = document.querySelectorAll(".modal");

    modals.forEach((modal) => {
        modal.addEventListener("shown.bs.modal", function () {
            const typeSelect = modal.querySelector('[id="décédé-choise"]');
            const etat = modal.querySelector('[id="décédé"]');

            if (typeSelect && etat) {
                function toggleEtatField() {
                    if (typeSelect.value === '2') {
                        etat.setAttribute("disabled", "");
                        etat.style.cursor = "not-allowed";
                    } else {
                        etat.removeAttribute("disabled");
                        etat.style.cursor = "auto";
                    }
                }

                // إضافة الحدث
                typeSelect.addEventListener('change', toggleEtatField);

                // تشغيل عند فتح المودال
                toggleEtatField();
            }
        });
    });
});
</script>



                <?php include('script.php');?>
</body>

</html>