<?php $page="Livers" ?>
<?php 
    include("../../shared/libs/bd.php");

$sql = "SELECT livres.id_livre, livres.titre, livres.img,livres.description, auteurs.nom AS auteur
FROM livres
JOIN auteurs ON livres.id_auteur = auteurs.id_auteur;
";
$result = $pdo->query($sql);
$livres = $result ->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">

<!-- BEGIN: head -->

<?php include("../includes/head.php")?>
<!-- END: head -->

<body class="p-4">
    <div class="container-fluid">
        <div class="row">
            <!-- BEGIN: Side Menu -->

            <?php include("../includes/sidemenu.php")?>

            <!-- END: Side Menu -->
            <div class="col pt-2 bg-content rounded-5">
                <div class="">
                    <h2></h2>
                </div>
                <div class="content">
                    <div class="px-2">
                        <h2 class="mt-4 fw-medium fs-5">Livers</h2>
                    </div>
                    <!-- BEGIN: Chercher Menu -->
                    <div class="d-flex px-2 mt-4">
                        <div class="me-2">

                            <select class="form-select w-auto" name="" id="">
                                <option selected disabled>Chercher par</option>
                                <option value="">Titre</option>
                                <option value="">Auteur</option>
                                <option value="">genre</option>
                                <option value="">Année de Publication</option>
                            </select>
                        </div>

                        <input type="text" class="form-control me-2" placeholder="Chercher">
                        <button class="btn btn-primary">Chercher</button>

                    </div>
                    <!-- END: Chercher Menu -->
                    <div class="my-5">
                        <div class="container-md">
                            <div class="bg-white rounded-3 ">
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Liste de Livers</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <!-- <table class="table table-bordered">
                                        <thead>
                                            <th>ISBN</th>
                                            <th>Titre</th>
                                            <th>Auteur</th>
                                            <th>Genre</th>
                                            <th>Annee Publication</th>
                                            <th>Emplacement</th>
                                            <th>Stock</th>
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
                                                <td><button class="btn btn-warning mb-2 mb-xl-0 me-2">Modifier</button><button class="btn btn-danger mb-2 mb-xl-0">Supprimer</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-warning me-2 mb-2 mb-xl-0">Modifier</button><button class="btn btn-danger mb-2 mb-xl-0">Supprimer</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-warning me-2 mb-2 mb-xl-0">Modifier</button><button class="btn btn-danger mb-2 mb-xl-0">Supprimer</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>La Peste</td>
                                                <td>Albert Camus</td>
                                                <td>Philosophie</td>
                                                <td>1947</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td><button class="btn btn-warning me-2 mb-2 mb-xl-0">Modifier</button><button class="btn btn-danger mb-2 mb-xl-0">Supprimer</button></td>
                                            </tr>
                                        </tbody>

                                    </table> -->
                                    <!-- <div class="row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Special title treatment</h5>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Special title treatment</h5>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div> -->
                                    <div
                                        class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">
                                        <?php foreach($livres as $index => $livre){  ?>

                                        <div class="col">
                                            <div class="card">
                                                <img src="<?= $livre->img;?>" class="card-img-top"
                                                    alt="<?= $livre->titre; ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <?= $livre->titre;?>
                                                    </h5>
                                                    <p class="card-text">
                                                        <?= $livre->auteur;?>
                                                    </p>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#modal-<?= $index; ?>">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-<?= $index; ?>" tabindex="-1" aria-labelledby="modalLabel-<?= $index; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="modalLabel-<?= $index; ?>">
                                                            <?= htmlspecialchars($livre->titre); ?>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-12 col-md-4 col-lg-3 ">
                                                                    <img src="<?= htmlspecialchars($livre->img); ?>" alt="" class="w-md-100 w-sm-50">
                                                                </div>
                                                                <div class="col">
                                                                    <h1><?= htmlspecialchars($livre->titre); ?></h1>
                                                                    <p><?= htmlspecialchars($livre->description); ?></p>
                                                                    <div class="container mt-5">
                                                                        <h3 class="mb-4">مجموع التقييم</h3>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">التقييم الكلي</label>
                                                                            <div class="star-rating" id="average-rating-<?= $livre->id_livre; ?>">
                                                                                <!-- سيتم عرض متوسط النجوم هنا -->
                                                                            </div>
                                                                            <p id="average-rating-text-<?= $livre->id_livre; ?>" class="text-muted mt-2 small"></p>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                                                    <!-- <div class="col">
                                                        <div class="card">
                                                            <img src="..\img\9782075128063_1_75.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Card title</h5>
                                                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <img src="..\img\9782070581054_1_75.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Card title</h5>
                                                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <img src="..\img\9782070360024_1_75.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Card title</h5>
                                                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <img src="..\img\3744438.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Card title</h5>
                                                                <p class="card-text">This is a longer card with supporting text
                                                                    below as a natural lead-in to additional content. This content
                                                                    is a little bit longer.</p>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
            
                                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <img src="..." class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Card title</h5>
                                                                <p class="card-text">This is a longer card with supporting text
                                                                    below as a natural lead-in to additional content. This content
                                                                    is a little bit longer.</p>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
            
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <img src="..." class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Card title</h5>
                                                                <p class="card-text">This is a longer card with supporting text
                                                                    below as a natural lead-in to additional content. This content
                                                                    is a little bit longer.</p>
                                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
            
                                                                    
                                                            
                                                            </div>
                                                        </div>
                                                    </div> -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
                integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
                crossorigin="anonymous"></script>
       

<script>
    // دالة لحساب متوسط التقييم
    function calculateAverageRating(reviews) {
        const totalRatings = reviews.length;
        if (totalRatings === 0) return 0; // إذا لم تكن هناك تقييمات

        const sumRatings = reviews.reduce((sum, review) => sum + review.rating, 0);
        return (sumRatings / totalRatings).toFixed(1); // إرجاع المتوسط إلى منزلة عشرية واحدة
    }

    // دالة لعرض متوسط التقييم على شكل نجوم
    function renderAverageRating(averageRating, livreId) {
        const ratingContainer = document.getElementById(`average-rating-${livreId}`);
        const ratingText = document.getElementById(`average-rating-text-${livreId}`);

        ratingContainer.innerHTML = ''; // إفراغ النجوم السابقة

        // حساب عدد النجوم الممتلئة والنصف ممتلئة
        const fullStars = Math.floor(averageRating); // عدد النجوم الممتلئة
        const hasHalfStar = averageRating - fullStars >= 0.5; // هل يوجد نجمة نصف ممتلئة؟
        const emptyStars = 5 - Math.ceil(averageRating); // عدد النجوم الفارغة

        // إنشاء النجوم الممتلئة
        for (let i = 1; i <= fullStars; i++) {
            const star = document.createElement('i');
            star.classList.add('bi', 'bi-star-fill', 'text-warning'); // نجمة ممتلئة
            ratingContainer.appendChild(star);
        }

        // إنشاء نجمة نصف ممتلئة إذا لزم الأمر
        if (hasHalfStar) {
            const halfStar = document.createElement('i');
            halfStar.classList.add('bi', 'bi-star-half', 'text-warning'); // نجمة نصف ممتلئة
            ratingContainer.appendChild(halfStar);
        }

        // إنشاء النجوم الفارغة
        for (let i = 1; i <= emptyStars; i++) {
            const star = document.createElement('i');
            star.classList.add('bi', 'bi-star', 'text-warning'); // نجمة فارغة
            ratingContainer.appendChild(star);
        }

        // عرض النص الخاص بالتقييم
        ratingText.textContent = `متوسط التقييم: ${averageRating} من 5`;
    }

    // دالة لجلب التقييمات من API
    function fetchReviews(livreId) {
        fetch(`../includes/api/avis.php?id_livre=${livreId}`)
            .then(response => response.json())
            .then(data => {
                if (data.error || !data.reviews || data.reviews.length === 0) {
                    renderAverageRating(0, livreId); // عرض نجوم فارغة إذا لم تكن هناك تقييمات
                    document.getElementById(`average-rating-text-${livreId}`).textContent = 'لا توجد تقييمات.';
                } else {
                    const averageRating = calculateAverageRating(data.reviews); // حساب متوسط التقييم
                    renderAverageRating(averageRating, livreId); // عرض التقييم
                }
            })
            .catch(error => {
                console.error('خطأ أثناء جلب البيانات:', error);
                document.getElementById(`average-rating-text-${livreId}`).textContent = 'حدث خطأ أثناء جلب التقييم.';
            });
    }

    // استدعاء الدالة لكل كتاب عند تحميل الصفحة
    document.addEventListener('DOMContentLoaded', () => {
        <?php foreach ($livres as $livre): ?>
            fetchReviews(<?= $livre->id_livre; ?>);
        <?php endforeach; ?>
    });
</script>



</body>

</html>