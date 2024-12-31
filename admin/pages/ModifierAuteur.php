<?php
$page="Modifier Auteur";
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
                        <h2 class="mt-4 fw-medium fs-5">Modifier Auteur</h2>
                    </div>
                    <!-- END: Page Title -->
                    <!-- BEGIN: Chercher Menu -->
                    <div class="d-flex px-2 mt-4">
                        <input type="text" class="form-control me-2" placeholder="Chercher">
                        <button class="btn btn-primary">Chercher</button>

                    </div>
                    <!-- END: Chercher Menu -->
                    <!-- BEGIN: Main Content -->
                    <div class="my-5">
                        <div class="container-md">
                        <!-- BEGIN: Box Content -->

                            <div class="bg-white rounded-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Informations de Auteur</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <form>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Nom">Nom</label>
                                                <input id="Nom" type="text" class="form-control" placeholder="Nom" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Date_De_Naissance">Date De Naissance (seulement l'année)</label>
                                                <input id="Date_De_Naissance" type="text" class="form-control" placeholder="Date De Naissance" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="décédé-choise">Est-il décédé ou non ?</label>
                                                <input id="décédé-choise" type="text" class="form-control" placeholder="auteur" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="décédé">Date du décès (seulement l'année)</label>
                                                <input id="décédé" type="text" class="form-control" placeholder="Date du décès" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="photo">Sa photo, si elle est disponible</label>
                                                <input id="photo" type="text" class="form-control" placeholder="Chemin" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Description">Description de l'auteur</label>
                                                <textarea id="Description" class="form-control" placeholder="Description" ></textarea>
                                            </div>
                                            
                                            
                                        </div>
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </form>
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
</body>
</html>