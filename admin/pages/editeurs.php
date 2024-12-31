<?php
 $page="Liste Editeurs";
 

 include("../../shared/libs/bd.php");
 $sql = "SELECT *
 FROM editeurs;
 ";
 $result = $pdo->query($sql);
 $editeurs = $result ->fetchAll(PDO::FETCH_OBJ);
 

if (isset($_POST['Ajouter'])) {
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $contact = $_POST['Contact'];
    $description = $_POST['Description'];
    if (!empty($name)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO `editeurs` (`name`, `address`, `contact`, `description`)
            VALUES (:name, :address, :contact, :description)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':contact', $contact);
            $stmt->bindParam(':description', $description);
            if ($stmt->execute()) {
                header("location: editeurs.php");
                exit;
            } else {
                echo 'Failed to insert data';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }else {
        // رسالة خطأ إذا كانت الحقول الإلزامية فارغة
        echo 'Ajouter les données obligatoires.';
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: head -->

<?php include("../includes/head.php");?>
<!-- END: head -->
<body class="p-4">
    <div class="container-fluid">
        <div class="row">
            <!-- BEGIN: Side Menu -->
            <?php include("../includes/sidemenu.php");?>
            <!-- END: Side Menu -->
            <!-- BEGIN: Main -->

            <div class="col pt-2 bg-content rounded-5">
                <div class="">
                    <h2></h2>
                </div>
                 <!-- BEGIN: content -->
                <div class="content">
                    <!-- BEGIN: Page Title -->
                    <div class="px-2">
                        <h2 class="mt-4 fw-medium fs-5">Editeurs</h2>
                    </div>
                    <!-- END: Page Title -->
                    
                    <!-- BEGIN: Main Content -->
                    <div class="my-5">
                        <div class="container-md">
                        <!-- BEGIN: Box Content -->

                            <div class="bg-white rounded-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Informations de Editeur</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                <div
                                        class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">
                                        <?php foreach($editeurs as $index => $editeur){  ?>

                                        <div class="col">
                                            <div class="card">
                                                <img src="<?= $editeur->editeur_img;?>" class="card-img-top"
                                                    alt="<?= $editeur->name; ?>">
                                                <div class="card-body">
                                                    <h6 class="card-title">
                                                        <?= $editeur->name;?>
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
                                                            <?= htmlspecialchars($editeur->name); ?>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-12 col-md-4 col-lg-3 ">
                                                                    <img src="<?= htmlspecialchars($editeur->editeur_img); ?>" alt="" class="w-md-100 w-sm-50">
                                                                </div>
                                                                <div class="col">
                                                                    <h1><?= htmlspecialchars($editeur->name); ?></h1>
                                                                    <p><?= htmlspecialchars($editeur->description); ?></p>
                                                                    
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
                                                            <input type="hidden" name="id_editeur" value="<?= $editeur->id_editeur; ?>">

                                                            <div class="mb-3">
                                                                <label for="editeur-<?= $index; ?>" class="form-label">عنوان الكتاب</label>
                                                                <input type="text" class="form-control" id="editeur-<?= $index; ?>" name="editeur"
                                                                    value="<?= $editeur->name; ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="description-<?= $index; ?>" class="form-label">وصف الكتاب</label>
                                                                <textarea class="form-control" id="description-<?= $index; ?>" name="description" rows="7"
                                                                        required><?= $editeur->description; ?></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                    <label for="adresse-<?= $index; ?>" class="form-label">Address</label>
                                                                    <textarea class="form-control" id="adresse-<?= $index; ?>" name="adresse" row="3"
                                                                    ><?= $editeur->address; ?></textarea>
                                                                </div>

                                                            <div class="mb-3">
                                                                <label for="img-<?= $index; ?>" class="form-label">رابط الصورة</label>
                                                                <input type="file" name="file" class="form-control" id="img-<?= $index; ?>" >
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
                                <!-- END: Variable Content -->
                                   
                            </div>
                            <!-- END: Box Content -->

                        </div>
                        
                    </div>
                    <!-- END: Main Content -->
                </div>
                <!-- END: content -->
            </div>
            <!-- END: Main -->

        </div>
    </div>
    <?php include("../includes/script.php");?>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
</body>
</html>