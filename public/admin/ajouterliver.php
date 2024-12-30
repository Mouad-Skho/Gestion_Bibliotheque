<?php 
include("bd.php");
$sql = "SELECT * FROM categories";
$result = $pdo->query($sql);
$categories = $result ->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT * FROM auteurs";
$result = $pdo->query($sql);
$auteurs = $result ->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT * FROM `editeurs`";
$result = $pdo->query($sql);
$editeurs = $result ->fetchAll(PDO::FETCH_OBJ);

$page="Ajouter liver";
// if(isset($_POST['Ajouter'])){
//     $isbn = $_POST['ISBN'];
//     $titre = $_POST['Titre'];
//     $id_auteur = $_POST['auteurs'];
//     $id_editeur = $_POST['editeurs'];
//     $annee_publication = $_POST['annee_publication'];
//     $stock = $_POST['stock'];
//     $Emplacement = $_POST['Emplacement'];
//     $id_categorie = $_POST['Catégories'];
//     $description = $_POST['description'];
//     $img = $_POST['img'];
//     if(!empty($isbn) && !empty($titre) && !empty($id_auteur) && !empty($id_editeur)){
//         try {
//             $stmt = $pdo->prepare("INSERT INTO `livres` (`ISBN`, `titre`, `description`, `id_editeur`, `id_auteur`, `id_categorie`, `annee_publication`, `stock`, `Emplacement`, `img`) 
//                 VALUES (:ISBN, :titre, :description, :id_editeur, :id_auteur, :id_categorie, :annee_publication, :stock, :Emplacement, :img)");

//             $stmt->bindParam(':ISBN', $isbn);
//             $stmt->bindParam(':titre', $titre);
//             $stmt->bindParam(':description', $description);
//             $stmt->bindParam(':id_editeur', $id_editeur);
//             $stmt->bindParam(':id_auteur', $id_auteur);
//             $stmt->bindParam(':id_categorie', $id_categorie);
//             $stmt->bindParam(':annee_publication', $annee_publication);
//             $stmt->bindParam(':Emplacement', $Emplacement);
//             $stmt->bindParam(':img', $img);
//             $stmt->bindParam(':stock', $stock);

//         if ($stmt->execute()) {
//             header("location: ajouterliver.php");
//             exit;
//         } else {
//             echo 'Failed to insert data';
//         }
//         } catch (PDOException $e) {
//             echo 'Error: ' . $e->getMessage();
//         }

//     } else {
//     // Afficher un message d'erreur si les champs sont vides
//     echo 'Ajouter les données.';
//     }
// }
//------2-------
// if (isset($_POST['Ajouter'])) {
//     $isbn = $_POST['ISBN'];
//     $titre = $_POST['Titre'];
//     $id_auteur = $_POST['auteurs'];
//     $id_editeur = $_POST['editeurs'];
//     $annee_publication = $_POST['annee_publication'];
//     $stock = $_POST['stock'];
//     $Emplacement = $_POST['Emplacement'];
//     $id_categorie = $_POST['Catégories'];
//     $description = $_POST['description'];

//     // متغير لتخزين اسم الصورة (فارغ بشكل افتراضي)
//     $fileName = '';

//     // التحقق من وجود صورة مرفوعة
//     if (!empty($_FILES["img"]["name"])) {
//         $targetDir = "../img/"; // مسار المجلد الخاص برفع الصور
//         $fileName = basename($_FILES["img"]["name"]); // اسم الصورة
//         $targetFilePath = $targetDir . $fileName; // المسار الكامل للصورة
//         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); // استخراج الامتداد

//         // تحديد أنواع الملفات المسموح بها
//         $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
//         if (in_array($fileType, $allowTypes)) {
//             if (!move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)) {
//                 echo "Sorry, there was an error uploading your file.";
//                 $fileName = ''; // إذا حدث خطأ في رفع الصورة
//             }
//         } else {
//             echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
//             $fileName = ''; // إذا كان الامتداد غير مدعوم
//         }
//     }

//     // التحقق من إدخال الحقول الإلزامية
//     if (!empty($isbn) && !empty($titre) && !empty($id_auteur) && !empty($id_editeur)) {
//         try {
//             // إعداد استعلام الإدخال
//             $stmt = $pdo->prepare("INSERT INTO `livres` (`ISBN`, `titre`, `description`, `id_editeur`, `id_auteur`, `id_categorie`, `annee_publication`, `stock`, `Emplacement`, `img`) 
//                 VALUES (:ISBN, :titre, :description, :id_editeur, :id_auteur, :id_categorie, :annee_publication, :stock, :Emplacement, :img)");

//             // ربط القيم بالمتغيرات
//             $stmt->bindParam(':ISBN', $isbn);
//             $stmt->bindParam(':titre', $titre);
//             $stmt->bindParam(':description', $description);
//             $stmt->bindParam(':id_editeur', $id_editeur);
//             $stmt->bindParam(':id_auteur', $id_auteur);
//             $stmt->bindParam(':id_categorie', $id_categorie);
//             $stmt->bindParam(':annee_publication', $annee_publication);
//             $stmt->bindParam(':Emplacement', $Emplacement);
//             $stmt->bindParam(':img', $fileName); // اسم الصورة (فارغ إذا لم يتم رفع صورة)
//             $stmt->bindParam(':stock', $stock);

//             if ($stmt->execute()) {
                // header("location: ajouterliver.php");
//                 exit;
//             } else {
//                 echo 'Failed to insert data';
//             }
//         } catch (PDOException $e) {
//             echo 'Error: ' . $e->getMessage();
//         }
//     } else {
//         // رسالة خطأ إذا كانت الحقول الإلزامية فارغة
//         echo 'Ajouter les données obligatoires.';
//     }
// }
//-------3----------
if (isset($_POST['Ajouter'])) {
    $isbn = $_POST['ISBN'];
    $titre = $_POST['Titre'];
    $id_auteur = $_POST['auteurs'];
    $id_editeur = $_POST['editeurs'];
    $annee_publication = $_POST['annee_publication'];
    $stock = $_POST['stock'];
    $Emplacement = $_POST['Emplacement'];
    $id_categorie = $_POST['Catégories'];
    $description = $_POST['description'];

    // متغير لتخزين اسم الصورة (فارغ بشكل افتراضي)
    $fileName = '';

    // التحقق من وجود صورة مرفوعة
    if (!empty($_FILES["img"]["name"])) {
        $targetDir = "../img/"; // مسار المجلد الخاص برفع الصور
        $fileName = basename($_FILES["img"]["name"]); // اسم الصورة
        $targetFilePath = $targetDir . $fileName; // المسار الكامل للصورة
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); // استخراج الامتداد

        // تحديد أنواع الملفات المسموح بها
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)) {
                echo "Image uploaded successfully: " . $fileName . "<br>";
                $fileName = $targetFilePath;
            } else {
                echo "Error: Unable to upload file. Check directory permissions.<br>";
                $fileName = ''; 
            }
        } else {
            echo "Error: Unsupported file type ($fileType). Only JPG, JPEG, PNG, & GIF are allowed.<br>";
            $fileName = ''; 
        }
    } else {
        echo "No image file uploaded.<br>";
    }

    // التحقق من إدخال الحقول الإلزامية
    if (!empty($isbn) && !empty($titre) && !empty($id_auteur) && !empty($id_editeur)) {
        try {
            // إعداد استعلام الإدخال
            $stmt = $pdo->prepare("INSERT INTO `livres` (`ISBN`, `titre`, `description`, `id_editeur`, `id_auteur`, `id_categorie`, `annee_publication`, `stock`, `Emplacement`, `img`) 
                VALUES (:ISBN, :titre, :description, :id_editeur, :id_auteur, :id_categorie, :annee_publication, :stock, :Emplacement, :img)");

            // ربط القيم بالمتغيرات
            $stmt->bindParam(':ISBN', $isbn);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id_editeur', $id_editeur);
            $stmt->bindParam(':id_auteur', $id_auteur);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->bindParam(':annee_publication', $annee_publication);
            $stmt->bindParam(':Emplacement', $Emplacement);
            $stmt->bindParam(':img', $fileName); // اسم الصورة (فارغ إذا لم يتم رفع صورة)
            $stmt->bindParam(':stock', $stock);

            if ($stmt->execute()) {
                header("location: ajouterliver.php");
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
                        <h2 class="mt-4 fw-medium fs-5">Ajouter liver</h2>
                    </div>
                    <!-- END: Page Title -->
                    
                    <!-- BEGIN: Main Content -->
                    <div class="my-5">
                        <div class="container-md">
                        <!-- BEGIN: Box Content -->

                            <div class="bg-white rounded-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Informations de livre</h4>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </symbol>
                                    <symbol id="info-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </symbol>
                                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </symbol>
                                </svg>
                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:" width="24" height="24" ><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <div>
                                        An example warning alert with an icon
                                    </div>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="ISBN">ISBN</label>
                                                <input id="ISBN" type="text" class="form-control" name="ISBN" placeholder="ISBN" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="titre">Titre</label>
                                                <input id="titre" type="text" class="form-control" name="Titre" placeholder="titre" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="auteur">Auteur</label>
                                                <select class="form-select" name="auteurs" id="auteurs">
                                                    <option value=""selected disabled>auteurs</option>
                                            <?php foreach($auteurs as $auteur){  ?>
                                                    <option value="<?= $auteur->id_auteur;?>"><?= $auteur->nom;?></option>
                                            <?php } ?>

                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="genre">editeurs</label>
                                                <select class="form-select" name="editeurs" id="editeurs">
                                                    <option value=""selected disabled>editeurs</option>
                                            <?php foreach($editeurs as $editeur){  ?>
                                                    <option value="<?= $editeur->id_editeur;?>"><?= $editeur->name;?></option>
                                            <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="annee_publication">Annee Publication</label>
                                                <input id="annee_publication" type="text" class="form-control" name="annee_publication" placeholder="annee_publication" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="stock">Stock</label>
                                                <input id="stock" type="text" class="form-control" name="stock" placeholder="stock" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Emplacement">Emplacement</label>
                                                <input id="Emplacement" type="text" class="form-control" name="Emplacement" placeholder="Emplacement" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Catégories">Catégories</label>
                                                <select class="form-select" name="Catégories" id="">
                                                    <option value=""selected disabled>Catégories</option>
                                            <?php foreach($categories as $categorie){  ?>
                                                    <option value="<?= $categorie->id_categorie;?>"><?= $categorie->name;?></option>
                                            <?php } ?>

                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea id="description" type="text" class="form-control" name="description" placeholder="annee_publication" ></textarea>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="img">img</label>
                                                <input id="img"  type="file" class="form-control" name="img" placeholder="img" >
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
    <?php include('script.php');?>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>