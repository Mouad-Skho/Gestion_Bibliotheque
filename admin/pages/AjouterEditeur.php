<?php
 $page="Ajouter Editeur";
 
include("../../shared/libs/bd.php");
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
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Name">Name</label>
                                                <input name="Name" id="Name" type="text" class="form-control" placeholder="Name" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Address">Address</label>
                                                <input name="Address" id="Address" type="text" class="form-control" placeholder="Address" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Contact">Contact</label>
                                                <input name="Contact" id="Contact" type="text" class="form-control" placeholder="Contact" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Description">Description de l'Editeur</label>
                                                <textarea name="Description" id="Description" class="form-control" placeholder="Description" ></textarea>
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
            <!-- END: Main -->

        </div>
    </div>
    <?php include("../includes/script.php");?>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>