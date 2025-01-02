<?php
$page="Ajouter adherent";
include("../../shared/libs/bd.php");

if (isset($_POST['Ajouter'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    // التحقق من إدخال الحقول الإلزامية
    if (!empty($nom) && !empty($email) && !empty($password) && !empty($telephone) && !empty($adresse) ) {
        try {
            // إعداد استعلام الإدخال
            $stmt = $pdo->prepare("INSERT INTO `membres` (`nom`, `email `, `password`, `telephone`, `adresse`) 
                VALUES (:nom, :email , :password, :telephone, :adresse)");

            // ربط القيم بالمتغيرات
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':adresse', $adresse);
            

            if ($stmt->execute()) {
                header("location: Ajouteradherent.php");
                exit;
            } else {
                echo 'Failed to insert data';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
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
                        <h2 class="mt-4 fw-medium fs-5">Ajouter adherent</h2>
                    </div>
                    <!-- END: Page Title -->

                    <!-- BEGIN: Main Content -->
                    <div class="my-5">
                        <div class="container-md">
                        <!-- BEGIN: Box Content -->

                            <div class="bg-white rounded-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Informations Personnelles</h4>
                                </div>
                                 <div class=" p-3 p-md-4">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Nom">Nom</label>
                                                <input id="Nom" name="nom" type="text" class="form-control" placeholder="Nom">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="E-mail">E-mail</label>
                                                <input id="E-mail" name="email" type="email" class="form-control" placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="password">password</label>
                                                <input id="password" name="password" type="password" class="form-control" placeholder="password">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Adresse">Adresse</label>
                                                <input id="Adresse" name="adresse" type="text" class="form-control" placeholder="Adresse">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Telephone">Telephone</label>
                                                <input id="Telephone" name="telephone" type="text" class="form-control" placeholder="Telephone">
                                            </div>
                                        </div>
                                        <button type="submit" name="Ajouter" class="btn btn-primary">Ajouter</button>
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
    <?php include("../includes/script.php");?>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>