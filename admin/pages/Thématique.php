<?php $page="Thématique" ?>
<?php 
include("bd.php");
$sql = "SELECT * FROM `genres`
";
$result = $pdo->query($sql);
$genres = $result ->fetchAll(PDO::FETCH_OBJ);
if(isset($_POST['Ajouter_Genre'])){
    $name_genre =$_POST['name_genre'];
    $description_genre = $_POST['description_genre'];
    if(!empty($name_genre)){
        try {
            $stmt = $pdo->prepare("INSERT INTO `genres` (`name`, `description`) VALUES (:name_genre, :description_genre)");

            $stmt->bindParam(':name_genre', $name_genre);
            $stmt->bindParam(':description_genre', $description_genre);
            

            if ($stmt->execute()) {
                header("location: Thématique.php");
                exit;
            } else {
                echo 'Failed to insert data';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    } else {
        // Afficher un message d'erreur si les champs sont vides
        echo 'Ajouter les données.';
    }
}

if(isset($_POST['Ajouter_Categorie'])){
    $name_Categorie =$_POST['name_Categorie'];
    $Genre =$_POST['Genre'];
    $description_Categorie = $_POST['description_Categorie'];
    if(!empty($name_Categorie)&&!empty($Genre)){
        try {
            $stmt = $pdo->prepare("INSERT INTO `categories` (`id_genre`, `name`, `description`)  
            VALUES (:Genre,:name_Categorie,:description_Categorie)");

$stmt->bindParam(':Genre', $Genre);
            $stmt->bindParam(':name_Categorie', $name_Categorie);
            $stmt->bindParam(':description_Categorie', $description_Categorie);
            

            if ($stmt->execute()) {
                header("location: Thématique.php");
                exit;
            } else {
                echo 'Failed to insert data';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    } else {
        // Afficher un message d'erreur si les champs sont vides
        echo 'Ajouter les données.';
    }
}
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
                        <h2 class="mt-4 fw-medium fs-5">Thématique</h2>
                    </div>
                    <!-- END: Page Title -->
                    <!-- BEGIN: Chercher Menu -->
                    <!-- <div class="d-flex px-2 mt-4">
                        <input type="text" class="form-control me-2" placeholder="Chercher">
                        <button class="btn btn-primary">Chercher</button>

                    </div> -->
                    <!-- END: Chercher Menu -->
                    <!-- BEGIN: Main Content -->
                    <div class="my-5">
                        <div class="container-md">
                            <!-- BEGIN: Box Content -->
                            <div class="bg-white rounded-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">َAjouter Genre</h4>
                                </div>
                                 <div class=" p-3 p-md-4">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Nom de Genre">Nom de Genre</label>
                                                <input id="Nom de Genre" name="name_genre" type="text" class="form-control" placeholder="Nom de Genre">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Description">Description</label>
                                                <textarea id="Description" name="description_genre" type="text" class="form-control" placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" name="Ajouter_Genre" class="btn btn-primary">Ajouter</button>
                                    </form>
                                </div>
                                <!-- END: Variable Content -->
                                   
                            </div>
                            <!-- END: Box Content -->
                            <!-- BEGIN: Box Content -->

                            <div class="bg-white rounded-3 mt-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Ajouter Categorie</h4>
                                </div>
                                 <div class=" p-3 p-md-4">    
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Nom de Catégorie">Nom de Catégorie</label>
                                                <input id="Nom de Catégorie" name="name_Categorie" type="text" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Genre">Genre</label>
                                                <select id="Genre" type="text" name="Genre" class="form-select">
                                                    <option value="" selected disabeld>Select Genre</option>
                                                    <?php foreach($genres as $genre){  ?>
                                                    <option value="<?= $genre->id_genre;?>"><?= $genre->name;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Description">Description</label>
                                                <textarea id="Description" name="description_Categorie" type="text" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" name="Ajouter_Categorie" class="btn btn-primary">Ajouter</button>
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
        </div>
    </div>
    <?php include('script.php');?>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>