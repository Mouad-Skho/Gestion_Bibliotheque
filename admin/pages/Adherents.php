<?php 
$page="Liste Adherents";
include("../../shared/libs/bd.php");

$sql = "SELECT * FROM membres  WHERE role = 'user'";
$result = $pdo->query($sql);
$Adherents = $result ->fetchAll(PDO::FETCH_OBJ);
if (isset($_POST['Modifier'])) {
    $id_membre = $_POST['id_membre'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    if (!empty($nom)) {
        try {
            $stmt = $pdo->prepare("UPDATE `membres` SET `nom` = :nom,`email` = :email,`telephone` = :telephone,`adresse` = :adresse WHERE `id_membre` = :id_membre;"
            );

            $stmt->bindParam(':id_membre', $id_membre);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':adresse', $adresse);
            if ($stmt->execute()) {
                header("location: Adherents.php");
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

if (isset($_POST['Desactiver'])) {
    $id_membre = $_POST['id_membre'];
    if (!empty($id_membre)) {
        try {
            $stmt = $pdo->prepare("UPDATE `membres` SET status = '1' WHERE `membres`.`id_membre` = :id_membre");
            $stmt->bindParam(':id_membre', $id_membre);
            if ($stmt->execute()) {
                header("location: Adherents.php");
                exit;
            } else {
                echo 'Desactiver Failed';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
if (isset($_POST['activer'])) {
    $id_membre = $_POST['id_membre'];
    if (!empty($id_membre)) {
        try {
            $stmt = $pdo->prepare("UPDATE `membres` SET status = '0' WHERE `membres`.`id_membre` = :id_membre");
            $stmt->bindParam(':id_membre', $id_membre);
            if ($stmt->execute()) {
                header("location: Adherents.php");
                exit;
            } else {
                echo 'activer Failed';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
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
                        <h2 class="mt-4 fw-medium fs-5">Adherents</h2>
                    </div>
                    <!-- END: Page Title -->
                    
                    <!-- BEGIN: Main Content -->
                    <div class="my-5">
                        <div class="container-md">
                            <!-- BEGIN: Box Content -->
                            <div class="bg-white rounded-3 mb-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Liste de Adherents</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>nom</th>
                                            <th>email</th>
                                            <th>telephone</th>
                                            <th>Adresse</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Adherents as $index => $Adherent){  
                                            $statusClass = ($Adherent->status == 0) ? 'btn-danger' : 'btn-success';
                                            $statusText = ($Adherent->status == 0) ? 'Désactiver' : 'Activer';
                                            $dataTarget = ($Adherent->status == 0) ? "deleteModal" : "activeModal";
                                            ?>
                                            <tr>
                                                <td><?= $Adherent->nom;?></td>
                                                <td><?= $Adherent->email;?></td>
                                                <td><?= $Adherent->telephone;?></td>
                                                <td><?= $Adherent->adresse;?></td>
                                                <td>
                                                <button class="btn btn-sm btn-warning mb-2 me-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#editModal-<?= $index; ?>">Modifier</button>
                                                <button
                                                 data-bs-toggle="modal" data-bs-target="#<?= $dataTarget?><?=$index; ?>"
                                                        class="btn btn-sm <?= $statusClass ?> mb-2 mb-xl-0"><?= $statusText ?></button></td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal-<?= $index; ?>" tabindex="-1"
                                                aria-labelledby="editModalLabel-<?= $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel-<?= $index; ?>">تعديل معلومات الكتاب</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form  method="POST">
                                                                <input type="hidden" name="id_membre" value="<?= $Adherent->id_membre; ?>">

                                                                <div class="mb-3">
                                                                    <label for="nom-<?= $index; ?>" class="form-label">Nom</label>
                                                                    <input type="text" class="form-control" id="nom-<?= $index; ?>" name="nom"
                                                                        value="<?= $Adherent->nom; ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="email-<?= $index; ?>" class="form-label">E-mail</label>
                                                                    <input type="email" class="form-control" id="email-<?= $index; ?>" name="email"
                                                                           value="<?= $Adherent->email; ?>" required >
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="telephone-<?= $index; ?>" class="form-label">Telephone</label>
                                                                    <input type="text" class="form-control" id="telephone-<?= $index; ?>" name="telephone"
                                                                        value="<?= $Adherent->telephone; ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="adresse-<?= $index; ?>" class="form-label">Address</label>
                                                                    <textarea class="form-control" id="adresse-<?= $index; ?>" name="adresse" row="3"
                                                                    ><?= $Adherent->adresse; ?></textarea>
                                                                </div>



                                                                
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="Modifier" class="btn btn-warning">Modifier</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Désactiver-->
                                            <div class="modal fade" id="deleteModal<?= $index; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title" id="deleteModalLabel<?= $index; ?>">Confirmation de désactivation</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" name="id_membre" value="<?= $Adherent->id_membre; ?>">
                                                            <p>Êtes-vous sûr de vouloir Désactiver le compte de l'Adherent <strong><?=$Adherent->nom; ?></strong> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" name="Desactiver" class="btn btn-danger">Désactiver</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal activer-->
                                            <div class="modal fade" id="activeModal<?= $index; ?>" tabindex="-1" aria-labelledby="activeModalLabel<?= $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success text-white">
                                                            <h5 class="modal-title" id="activeModalLabel<?= $index; ?>">Confirmation de activation</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" name="id_membre" value="<?= $Adherent->id_membre; ?>">
                                                            <p>Êtes-vous sûr de vouloir activer le compte de l'Adherent <strong><?=$Adherent->nom; ?></strong> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" name="activer" class="btn btn-success">activer</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </tbody>

                                    </table>
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
        </div>
    </div>
    <?php include("../includes/script.php");?>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>