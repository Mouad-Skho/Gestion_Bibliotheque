<?php
$page="Modifier liver";
include("../../shared/libs/bd.php");
$sql = "SELECT livres.*, auteurs.nom AS auteur, categories.name AS categorie
FROM livres
JOIN auteurs ON livres.id_auteur = auteurs.id_auteur
JOIN categories ON livres.id_categorie = categories.id_categorie";
$result = $pdo->query($sql);
$livres = $result ->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<!-- BEGIN: head -->

<?php include("../includes/head.php");?>
<!-- END: head -->

<body class="p-sm-4">
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
                        <h2 class="mt-4 fw-medium fs-5">Modifier liver</h2>
                    </div>
                    <!-- END: Page Title -->

                    <!-- BEGIN: Chercher Menu -->
                    <div class="d-flex px-2 mt-4">
                        <div class="me-2">

                            <select class="form-select w-auto" name="" id="">
                                <option class="" selected disabled>Chercher par</option>
                                <option value="">Titre</option>
                                <option value="">ISBN</option>
                                <option value="">Auteur</option>
                            </select>
                        </div>

                        <select id="select-beast" placeholder="Select a person..." autocomplete="off" class="from-select w-75 me-2">
                            <option value="">Select a person...</option>
                            
                                
                            </select>
                            <button class="btn btn-primary" onclick="submitSearch()">Chercher</button>
                            
                        </div>
                        <!-- <input type="text" class="form-control me-2" placeholder="Chercher"> -->
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
                                    <form method="post" id="update_form">
                                    <input type="hidden" name="id_livre" id="id_livre">
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
                                                <input id="auteur" name="auteur" type="text" class="form-control" placeholder="auteur">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="genre">Genre</label>
                                                <input id="genre" name="genre" type="text" class="form-control" placeholder="genre">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="annee_publication">Annee Publication</label>
                                                <input id="annee_publication" name="annee_publication" type="text" class="form-control"
                                                    placeholder="annee_publication">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="stock">Stock</label>
                                                <input id="stock" name="emplacement" type="text" class="form-control" placeholder="stock">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Emplacement">Emplacement</label>
                                                <input id="Emplacement" type="text" class="form-control"
                                                    placeholder="Emplacement">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Catégories">Catégories</label>
                                                <select class="form-select" name="categorie" >
                                                    <option id="categorie" value=""selected disabled>Catégories</option>
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
    <?php include("../includes/script.php");?>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tom-select/2.4.1/js/tom-select.complete.js" integrity="sha512-4C/xXn1q4nHq8VQ7980qwUp2brDFW/22/0eqa8506uQUxCh06teLlJQZ/kcdmpd4AJkeKVnk9CPiYzhV6HOb0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script>   
        new TomSelect("#select-beast",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    </script> -->
           <!--    <script> 
        function submitSearch() {
        const searchBy = document.getElementById('search_by').value;
        const selectedLivre = document.getElementById('select-beast').value;
    
        if (!searchBy && !selectedLivre) {
            alert('Veuillez sélectionner une option pour rechercher.');
            return;
        }
    
        // إرسال البيانات إلى السيرفر
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'process_search.php'; // عدّل الرابط حسب الحاجة
    
        // إضافة الحقول إلى النموذج
        if (searchBy) {
            const searchByInput = document.createElement('input');
            searchByInput.type = 'hidden';
            searchByInput.name = 'search_by';
            searchByInput.value = searchBy;
            form.appendChild(searchByInput);
        }
    
        if (selectedLivre) {
            const selectedLivreInput = document.createElement('input');
            selectedLivreInput.type = 'hidden';
            selectedLivreInput.name = 'livre_id';
            selectedLivreInput.value = selectedLivre;
            form.appendChild(selectedLivreInput);
        }
    
        document.body.appendChild(form);
        form.submit();
    }
    </script> -->
    <script>
        // جلب البيانات من PHP
        const livres = <?= json_encode($livres); ?>;
        console.log(livres);

        // تهيئة القائمة المنسدلة مع Tom Select
        const select = new TomSelect("#select-beast", {
            options: livres.map(livre => ({
                value: livre.id_livre, // القيمة الفريدة (id_livre)
                text: `${livre.titre} - ${livre.auteur}`, // النص الذي يظهر
            })),
            placeholder: "Sélectionnez un livre...",
        });

        // عند اختيار كتاب، تحديث الحقول في النموذج
        select.on('change', function(value) {
            const selectedLivre = livres.find(livre => livre.id_livre == value);

            if (selectedLivre) {
                // تعبئة الحقول بناءً على الكتاب المختار
                document.getElementById('id_livre').value = selectedLivre.id_livre;
                document.getElementById('ISBN').value = selectedLivre.ISBN || ''; 
                document.getElementById('titre').value = selectedLivre.titre || '';
                document.getElementById('auteur').value = selectedLivre.auteur || '';
                document.getElementById('genre').value = selectedLivre.genre || '';
                document.getElementById('annee_publication').value = selectedLivre.annee_publication || '';
                document.getElementById('stock').value = selectedLivre.stock || '';
                document.getElementById('Emplacement').value = selectedLivre.emplacement || '';
                document.getElementById('categorie').value = selectedLivre.categorie || '';
            } else {
                // تفريغ الحقول إذا لم يتم اختيار أي كتاب
                document.getElementById('update_form').reset();
            }
        });
    </script>
    </body>

</html>