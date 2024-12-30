<?php 
include("bd.php");

$sql = "SELECT * FROM auteurs";
$result = $pdo->query($sql);
$auteurs = $result ->fetchAll(PDO::FETCH_OBJ);

$page="Ajouter Auteur";

//-------3----------
if (isset($_POST['Ajouter'])) {
    $nom = $_POST['nom'];
    $bio = $_POST['bio'];

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
    if (!empty($nom)) {
        try {
            // إعداد استعلام الإدخال
            $stmt = $pdo->prepare("INSERT INTO `auteurs` (`nom`, `bio`, `auteur_img`) 
                VALUES (:nom, :bio, :auteur_img)");

            // ربط القيم بالمتغيرات
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':bio', $bio);
            $stmt->bindParam(':auteur_img', $fileName); // اسم الصورة (فارغ إذا لم يتم رفع صورة)
           

            if ($stmt->execute()) {
                header("location: ajouterauteur.php");
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
    <div class="toast-container position-static position-fixed top-0 end-0 mt-2 me-2">        
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
                <strong class="me-auto">Bootstrap</strong>
                <small class="text-body-secondary">11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            Hello, world! This is a toast message.
            </div>
        </div>
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
                <strong class="me-auto">Bootstrap</strong>
                <small class="text-body-secondary">11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            Hello, world! This is a toast message.
            </div>
        </div>
    </div>
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
                        <h2 class="mt-4 fw-medium fs-5">Ajouter Auteur</h2>
                    </div>
                    <!-- END: Page Title -->
                    
                    <!-- BEGIN: Main Content -->
                    <div class="my-5">
                        <div class="container-md">
                        <!-- BEGIN: Box Content -->

                            <div class="bg-white rounded-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Informations de Auteur</h4>
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
                                                <label class="form-label" for="Nom">Nom</label>
                                                <input id="Nom" type="text" class="form-control" name="nom" placeholder="Nom" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Date_De_Naissance">Date De Naissance (seulement l'année)</label>
                                                <input id="Date_De_Naissance" type="text" class="form-control" placeholder="Date De Naissance" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="décédé-choise">Est-il décédé ou non ?</label>
                                                <select id="décédé-choise" type="text" class="form-control" placeholder="auteur" >
                                                    <option value="" selected disabled>Choise etat</option>
                                                    <option value="1">décédé</option>
                                                    <option value="2">non</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3" id="décédé_div">
                                                <label class="form-label" for="décédé">Date du décès (seulement l'année)</label>
                                                <input id="décédé" type="text" class="form-control" placeholder="Date du décès" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="img">img</label>
                                                <input id="img"  type="file" class="form-control" name="img" placeholder="img" >
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" for="Description">Description de l'auteur</label>
                                                <textarea id="Description" class="form-control" name="bio" placeholder="Description" ></textarea>
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

    <script src="https://cdn.jsdelivr.net/npm/lucide@0.468.0/dist/cjs/lucide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>document.addEventListener("DOMContentLoaded", function() {
                const typeSelect = document.getElementById('décédé-choise');
                const etat = document.getElementById('décédé');

                function toggleEtatField() {
                    if (typeSelect.value === '2') { 
                        etat.setAttribute("disabled", "");
                        etat.style.cursor ="not-allowed";
                    } else {
                        etat.removeAttribute("disabled");
                        etat.style.cursor ="auto";
                        
                    }
                }

                // Add event listener to typeSelect
                typeSelect.addEventListener('change', toggleEtatField);

                // Run on page load
                toggleEtatField();
            });</script>
            <?php include('script.php');?>
</body>
</html>