<?php $page="Liste Adherents";
include("bd.php");

$sql = "SELECT * FROM membres";
$result = $pdo->query($sql);
$Adherents = $result ->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: head -->

<?php include("component/head.php");?>
<!-- END: head -->
<body class="p-4">
    <div class="container-fluid">
        <div class="row">
            <!-- BEGIN: Side Menu -->
            <?php include("component/sidemenu.php");?>
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
                                            <th>Nombre emprunt</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Adherents as $index => $Adherent){  ?>
                                            <tr>
                                                <td><?= $Adherent->nom;?></td>
                                                <td><?= $Adherent->email;?></td>
                                                <td><?= $Adherent->telephone;?></td>
                                                <td><?= $Adherent->adresse;?></td>
                                                <td><?= $Adherent->n_emprunt;?></td>
                                                <td>
                                                <button class="btn btn-sm btn-warning mb-2 me-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#editModal-<?= $index; ?>">Modifier</button>
                                                <button
                                                 data-bs-toggle="modal" data-bs-target="#deleteModal<?=$index; ?>"
                                                        class="btn btn-sm btn-danger mb-2 mb-xl-0">Désactiver</button></td>
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

                                                                <div class="mb-3">
                                                                    <label for="n_emprunt-<?= $index; ?>" class="form-label">Nombre Emprunt</label>
                                                                    <input type="number" class="form-control" id="n_emprunt-<?= $index; ?>" name="n_emprunt"
                                                                        value="<?= $Adherent->n_emprunt; ?>">
                                                                </div>

                                                                
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-warning">Modifier</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal suppression-->
                                            <div class="modal fade" id="deleteModal<?= $index; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title" id="deleteModalLabel<?= $index; ?>">Confirmation de désactivation</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" name="id_Adherent" value="<?= $Adherent->id_membre; ?>">
                                                            <p>Êtes-vous sûr de vouloir Désactiver le compte de l'Adherent <strong><?=$Adherent->nom; ?></strong> ? Cette action est irréversible.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" name="Supprimer" class="btn btn-danger">Désactiver</button>
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
    <?php include('script.php');?>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>