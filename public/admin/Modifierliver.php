<?php $page="Modifier liver" ?>

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
                        <h2 class="mt-4 fw-medium fs-5">Modifier liver</h2>
                    </div>
                    <!-- END: Page Title -->

                    <!-- BEGIN: Chercher Menu -->
                    <div class="d-flex px-2 mt-4">
                        <div class="me-2">

                            <select class="form-select w-auto" name="" id="">
                                <option selected disabled>Chercher par</option>
                                <option value="">Titre</option>
                                <option value="">ISBN</option>
                                <option value="">Auteur</option>
                            </select>
                        </div>

                        <!-- <input type="text" class="form-control me-2" placeholder="Chercher"> -->
                        <select id="select-beast" placeholder="Select a person..." autocomplete="off">
                            <option value="">Select a person...</option>
                            <option value="4">Thomas Edison</option>
                            <option value="1">Nikola</option>
                            <option value="3">Nikola Tesla</option>
                            <option value="5">Arnold Schwarzenegger</option>
                        </select>
                        <button class="btn btn-primary">Chercher</button>

                    </div>
                    <!-- END: Chercher Menu -->

                    <!-- BEGIN: Main Content -->
                    <div class="my-5">
                        <div class="container-md">
                            <!-- BEGIN: Box Content -->

                            <div class="bg-white rounded-3">
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Informations de livre</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <form>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="ISBN">ISBN</label>
                                                <input id="ISBN" type="text" class="form-control" placeholder="ISBN">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="titre">Titre</label>
                                                <input id="titre" type="text" class="form-control" placeholder="titre">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="auteur">Auteur</label>
                                                <input id="auteur" type="text" class="form-control" placeholder="auteur">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="genre">Genre</label>
                                                <input id="genre" type="text" class="form-control" placeholder="genre">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="annee_publication">Annee Publication</label>
                                                <input id="annee_publication" type="text" class="form-control"
                                                    placeholder="annee_publication">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="stock">Stock</label>
                                                <input id="stock" type="text" class="form-control" placeholder="stock">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Emplacement">Emplacement</label>
                                                <input id="Emplacement" type="text" class="form-control"
                                                    placeholder="Emplacement">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Catégories">Catégories</label>
                                                <select class="form-select" name="" id="">
                                                    <option value=""selected disabled>Catégories</option>
                                                    <option value="">L'art</option>
                                                    <option value="">Philosophie</option>
                                                    <option value="">economie</option>
                                                    <option value="">Roman</option>
                                                    <option value="">Histoire</option>
                                                    <option value="">Manga</option>
                                                    <option value="">Informatique</option>
                                                </select>
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
                <!-- END: Box Content -->
            </div>
            <!-- END: Main -->

        </div>
    </div>
    <?php include('script.php');?>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>