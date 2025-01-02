<?php
$page="Emprunts";
include("../../shared/libs/bd.php");
$sql = "SELECT 
    emprunts.*,
    livres.titre AS livre, 
    membres.nom AS emprunteur,
    reservations.date_reservation
     FROM `emprunts`
     JOIN livres ON emprunts.id_livre = livres.id_livre
     JOIN membres ON emprunts.id_membre = membres.id_membre
     JOIN reservations ON emprunts.id_reservation = reservations.id_reservation
     ";
$result = $pdo->query($sql);
$emprunts = $result ->fetchAll(PDO::FETCH_OBJ);
$sql = "SELECT 
        reservations.*, 
        livres.titre AS livre, 
        livres.isbn AS ISBN, 
        livres.stock AS stock, 
        membres.nom AS emprunteur 
    FROM reservations
    JOIN livres ON reservations.id_livre = livres.id_livre
    JOIN membres ON reservations.id_membre = membres.id_membre
";
$result = $pdo->query($sql);
$reservations = $result->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['Accepté'])) {
    $id_reservation = $_POST["id_reservation"];
    $id_membre = $_POST["id_membre"];
    $id_livre = $_POST["id_livre"];
    if (!empty($id_reservation)) {
        try {
            // تحديث حالة الحجز إلى 'Accepted'
            $stmt = $pdo->prepare("UPDATE `reservations` SET status = 'Accepted' WHERE `id_reservation` = :id_reservation");
            $stmt->bindParam(':id_reservation', $id_reservation);

            if ($stmt->execute()) {
                // إدخال البيانات إلى جدول emprunts بعد تحديث الحالة
                $stmt2 = $pdo->prepare("INSERT INTO emprunts (id_livre, id_membre, id_reservation, date_emprunt, date_retour)
                                         VALUES (:id_livre, :id_membre, :id_reservation, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 10 DAY))");

                // تأكد من أنك تمرر القيم الصحيحة مثل id_livre و id_membre
                // يجب أن يكون لديك متغيرات تحتوي على القيم لهذه الحقول
                $stmt2->bindParam(':id_livre', $id_livre); // تأكد من أنك قد حددت قيمة id_livre
                $stmt2->bindParam(':id_membre', $id_membre); // تأكد من أنك قد حددت قيمة id_membre
                $stmt2->bindParam(':id_reservation', $id_reservation);

                if ($stmt2->execute()) {
                    header("Location: Emprunts.php");
                    exit;
                } else {
                    echo 'Insertion in emprunts failed';
                }
            } else {
                echo 'Acceptation Failed';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
var_dump($_POST);
// if (isset($_POST['Accepté'])) {
//     $id_reservation = $_POST["id_reservation"];
//     if (!empty($id_reservation)) {
//         try {
//             $stmt = $pdo->prepare("UPDATE `reservations` SET status = 'Accepted' WHERE `reservations`.`id_reservation` = :id_reservation";
//             "INSERT INTO emprunts (id_livre, id_membre, id_reservation, date_emprunt, date_retour);
// VALUES (id_livre, id_membre, id_reservation, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 10 DAY));");
//             $stmt->bindParam(':id_reservation', $id_reservation);
//             if ($stmt->execute()) {
//                 header("location: Emprunts.php");
//                 exit;
//             } else {
//                 echo 'Acceptation Failed';
//             }
//         } catch (PDOException $e) {
//             echo 'Error: ' . $e->getMessage();
//         }
//     }
// }

if (isset($_POST['Annuler'])) {
    $id_reservation = $_POST["id_reservation"];
    if (!empty($id_reservation)) {
        try {
            $stmt = $pdo->prepare("UPDATE `reservations` SET status = 'Cancelled' WHERE `reservations`.`id_reservation` = :id_reservation");
            $stmt->bindParam(':id_reservation', $id_reservation);
            if ($stmt->execute()) {
                header("location: Emprunts.php");
                exit;
            } else {
                echo 'Annulation Failed';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
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
                                    <h4 class="fw-medium lh-base fs-6 m-0">Validation des reservations</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>ISBN</th>
                                            <th>Titre</th>
                                            <th>Stock</th>
                                            <th>Emprunteur</th>
                                            <th>Date Réservation</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach($reservations as $index => $reservation){  ?>
                                            <tr>
                                                <td><?= $reservation->ISBN;?></td>
                                                <td><?= $reservation->livre;?></td>
                                                <td><?= $reservation->stock;?></td>
                                                <td><?= $reservation->emprunteur;?></td>
                                                <td><?= $reservation->date_reservation;?></td>
                                                <td>
                                                    <button class="btn btn-success mb-2 mb-xl-0 me-2" data-bs-toggle="modal" data-bs-target="#AcceptreserveModal-<?= $index; ?>">Accepté</button>
                                                    <button class="btn btn-danger mb-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#annulerreserveModal-<?= $index; ?>">Annuler</button>
                                                </td>
                                            </tr>
                                             <!-- Modal Acceptér-->
                                             <div class="modal fade" id="AcceptreserveModal-<?= $index; ?>" tabindex="-1" aria-labelledby="AcceptreserveModalLabel<?= $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success text-white">
                                                            <h5 class="modal-title" id="AcceptreserveModalLabel<?= $index; ?>">Acceptation de reservations</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" name="id_reservation" value="<?= $reservation->id_reservation ?>">
                                                            <input type="hidden" name="id_livre" value="<?= $reservation->id_livre ?>">
                                                            <input type="hidden" name="id_reservation" value="<?= $reservation->id_membre ?>">
                                                            <p>Êtes-vous sûr de vouloir Accepté la reservation de l'Adherent <strong><?=$reservation->emprunteur; ?></strong> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="Accepté" class="btn btn-success" data-bs-dismiss="modal">Acceptér</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Annuler-->
                                            <div class="modal fade" id="annulerreserveModal-<?= $index; ?>" tabindex="-1" aria-labelledby="annulerreserveModalLabel<?= $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title" id="deleteModalLabel<?= $index; ?>">Annulation de reservations</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" name="id_reservation" value="<?= $reservation->id_reservation; ?>">
                                                            <p>Êtes-vous sûr de vouloir Annuler la reservation de l'Adherent <strong><?=$reservation->emprunteur; ?></strong> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="Annuler" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
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
                            <!-- BEGIN: Box Content -->
                            <div class="bg-white rounded-3 mb-3" >
                                <!-- BEGIN: Variable Content -->
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Validation des Emprunts</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Emprunt</th>
                                            <th>Reservation</th>
                                            <th>Livre</th>
                                            <th>Emprunteur</th>
                                            <th>Date Réservation</th>
                                            <th>Date Emprunt</th>
                                            <th>Date Retour</th>
                                            
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach($emprunts as $index => $emprunt){  ?>
                                            <tr>
                                                <td><?= $emprunt->id_emprunt;?></td>
                                                <td><?= $emprunt->id_reservation;?></td>
                                                <td><?= $emprunt->livre;?></td>
                                                <td><?= $emprunt->emprunteur;?></td>
                                                <td><?= $emprunt->date_reservation;?></td>
                                                <td><?= $emprunt->date_emprunt;?></td>
                                                <td><?= $emprunt->date_retour;?></td>
                                                <td>
                                                    <button class="btn btn-success mb-2 mb-xl-0 me-2" data-bs-toggle="modal" data-bs-target="#AcceptéModal-<?= $index; ?>">Accepté</button>
                                                    <button class="btn btn-danger mb-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#annulerModal-<?= $index; ?>">Annuler</button></td>
                                            </tr>
                                           
                                            <?php } ?>
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