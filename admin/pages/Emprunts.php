<?php
$page="Emprunts";
include("../../shared/libs/bd.php");
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
                        <h2 class="mt-4 fw-medium fs-5">Gestion des Emprunts</h2>
                    </div>
                    <!-- END: Page Title -->
                    
                    <!-- BEGIN: Main Content -->
                    <div class="my-5">
                        <div class="container-md">
                            <!-- BEGIN: Box Content -->
                            <div class="bg-white rounded-3 mb-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Validation des Emprunts</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>ISBN</th>
                                            <th>Titre</th>
                                            <th>Emprunteur</th>
                                            <th>Genre</th>
                                            <th>Emplacement</th>
                                            <th>Date Emprunt</th>
                                            <th>Date Retour</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-success mb-2 mb-xl-0 me-2">Valider</button><button class="btn btn-danger mb-2 mb-xl-0">Annuler</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-success me-2 mb-2 mb-xl-0">Valider</button><button class="btn btn-danger mb-2 mb-xl-0">Annuler</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-success me-2 mb-2 mb-xl-0">Valider</button><button class="btn btn-danger mb-2 mb-xl-0">Annuler</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-success me-2 mb-2 mb-xl-0">Valider</button><button class="btn btn-danger mb-2 mb-xl-0">Annuler</button></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- END: Variable Content -->
                                   
                            </div>
                            <!-- END: Box Content -->
                            <!-- BEGIN: Box Content -->
                            <div class="bg-white rounded-3 mb-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Validation des Emprunts</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>ISBN</th>
                                            <th>Titre</th>
                                            <th>Emprunteur</th>
                                            <th>Genre</th>
                                            <th>Emplacement</th>
                                            <th>Date Emprunt</th>
                                            <th>Date Retour</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-success mb-2 mb-xl-0 me-2">Valider</button><button class="btn btn-danger mb-2 mb-xl-0">Annuler</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-success me-2 mb-2 mb-xl-0">Valider</button><button class="btn btn-danger mb-2 mb-xl-0">Annuler</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-success me-2 mb-2 mb-xl-0">Valider</button><button class="btn btn-danger mb-2 mb-xl-0">Annuler</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-success me-2 mb-2 mb-xl-0">Valider</button><button class="btn btn-danger mb-2 mb-xl-0">Annuler</button></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- END: Variable Content -->
                                   
                            </div>
                            <!-- END: Box Content -->
                            <!-- BEGIN: Box Content -->
                            <div class="bg-white rounded-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Liste des Emprunts</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>ISBN</th>
                                            <th>Titre</th>
                                            <th>Emprunteur</th>
                                            <th>Date Emprunt</th>
                                            <th>Date Retour</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td><button class="btn btn-success mb-2 mb-xl-0 me-2">Retour</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td><button class="btn btn-success me-2 mb-2 mb-xl-0">Retour</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td><button class="btn btn-success me-2 mb-2 mb-xl-0">Retour</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td><button class="btn btn-success me-2 mb-2 mb-xl-0">Retour</button></td>
                                            </tr>
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