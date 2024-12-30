<?php $page="Livers" ?>
<?php 
include("bd.php");
$sql = "SELECT livres.*, auteurs.nom AS auteur, categories.name 
FROM livres
JOIN auteurs ON livres.id_auteur = auteurs.id_auteur
JOIN categories ON livres.id_categorie = categories.id_categorie";

$result = $pdo->query($sql);
$livres = $result ->fetchAll(PDO::FETCH_OBJ);

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

                            <select class="form-select Cherche w-auto" name="" id="">
                                <option selected>All</option>
                                <option value="Titre">Titre</option>
                                <option value="ISBN">ISBN</option>
                                <option value="Auteur">Auteur</option>
                            </select>
                        </div>

                        <input type="text" class="form-control Cherche-input me-2" placeholder="Chercher">
                        <button class="btn btn-primary">Chercher</button>

                    </div>
                    <!-- END: Chercher Menu -->
                    <div class="my-5">
                        <div class="container-md">
                            <div class="bg-white rounded-3 overflow-x-scroll">
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Liste de Livers</h4>
                                </div>
                                <div class=" p-3 p-md-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>ISBN</th>
                                            <th>Titre</th>
                                            <th>Auteur</th>
                                            <th>Emplacement</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($livres as $index => $livre){  ?>

                                            <tr>
                                                <td><?= $livre->ISBN;?></td>
                                                <td><?= $livre->titre;?></td>
                                                <td><?= $livre->auteur;?></td>
                                                <td><?= $livre->Emplacement;?></td>
                                                <td><?= $livre->stock;?></td>
                                                <td class="d-lg-flex">
                                                    <button class="btn btn-sm btn-success mb-2 mb-xl-0 me-2"data-bs-toggle="modal" data-bs-target="#modal-<?= $index; ?>">Details</button>
                                                    <button class="btn btn-sm btn-warning mb-2 me-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#editModal-<?= $index; ?>">Modifier</button>
                                                    <button class="btn btn-sm btn-danger mb-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$index; ?>">Supprimer</button>
                                                </td>
                                            </tr>
                                               <!-- Modal Details -->
                                            <div class="modal fade" id="modal-<?= $index; ?>" tabindex="-1" aria-labelledby="modalLabel-<?= $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header  bg-zreg text-white">
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
                                                            <button type="button" class="btn bg-zreg text-white" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <!-- Modal Modifier-->
                                            <div class="modal fade" id="editModal-<?= $index; ?>" tabindex="-1"
                                                aria-labelledby="editModalLabel-<?= $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h5 class="modal-title" id="editModalLabel-<?= $index; ?>">تعديل معلومات الكتاب</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update_livre.php" method="POST">
                                                                <!-- إرسال ID الكتاب -->
                                                                <input type="hidden" name="id_livre" value="<?= $livre->id_livre; ?>">

                                                                <!-- تعديل العنوان -->
                                                                <div class="mb-3">
                                                                    <label for="titre-<?= $index; ?>" class="form-label">عنوان الكتاب</label>
                                                                    <input type="text" class="form-control" id="titre-<?= $index; ?>" name="titre"
                                                                        value="<?= $livre->titre; ?>" required>
                                                                </div>

                                                                <!-- تعديل الوصف -->
                                                                <div class="mb-3">
                                                                    <label for="description-<?= $index; ?>" class="form-label">وصف الكتاب</label>
                                                                    <textarea class="form-control" id="description-<?= $index; ?>" name="description" rows="3"
                                                                            required><?= $livre->description; ?></textarea>
                                                                </div>

                                                                <!-- تعديل الكاتب -->
                                                                <div class="mb-3">
                                                                    <label for="auteur-<?= $index; ?>" class="form-label">اسم الكاتب</label>
                                                                    <input type="text" class="form-control" id="auteur-<?= $index; ?>" name="auteur"
                                                                        value="<?= $livre->auteur; ?>" required>
                                                                </div>

                                                                <!-- تعديل النوع -->
                                                                <div class="mb-3">
                                                                    <label for="genre-<?= $index; ?>" class="form-label">النوع</label>
                                                                    <input type="text" class="form-control" id="genre-<?= $index; ?>" name="genre"
                                                                        value="<?= $livre->name; ?>">
                                                                </div>

                                                                <!-- تعديل السنة -->
                                                                <div class="mb-3">
                                                                    <label for="annee-<?= $index; ?>" class="form-label">سنة النشر</label>
                                                                    <input type="number" class="form-control" id="annee-<?= $index; ?>" name="annee_publication"
                                                                        value="<?= $livre->annee_publication; ?>">
                                                                </div>

                                                                <!-- تعديل الصورة -->
                                                                <div class="mb-3">
                                                                    <label for="img-<?= $index; ?>" class="form-label">رابط الصورة</label>
                                                                    <input type="file" name="file" class="form-control" id="img-<?= $index; ?>" >
                                                                </div>

                                                                <!-- تعديل المخزون -->
                                                                <div class="mb-3">
                                                                    <label for="stock-<?= $index; ?>" class="form-label">المخزون</label>
                                                                    <input type="number" class="form-control" id="stock-<?= $index; ?>" name="stock"
                                                                        value="<?= $livre->stock; ?>" required>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal suppression-->
                                            <div class="modal fade" id="deleteModal<?= $index; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title" id="deleteModalLabel<?= $index; ?>">Confirmation de suppression</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" name="id_livre" value="<?= $livre->id_livre; ?>">
                                                            <p>Êtes-vous sûr de vouloir supprimer le livre <strong><?=$livre->titre; ?></strong> ? Cette action est irréversible.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" name="Supprimer" class="btn btn-danger">Supprimer</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>

                                            <tr id="no-results-row" style="display: none;">
                                                <td colspan="6" style="text-align: center; color: red; font-weight: bold;">Acune Resulte</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        fetch(`../User/api/avis.php?id_livre=${livreId}`)
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
<!-- <script>
    document.querySelector('.form-control').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr:not(#no-results-row)'); // استبعاد صف الرسالة
        let visibleRows = 0; // عداد للصفوف الظاهرة

        rows.forEach(row => {
            const title = row.querySelector('td:nth-child(2)').textContent.toLowerCase(); // العمود الخاص بالعناوين
            const isbn = row.querySelector('td:nth-child(1)').textContent.toLowerCase(); // العمود الخاص بـ ISBN
            const author = row.querySelector('td:nth-child(3)').textContent.toLowerCase(); // العمود الخاص بالمؤلف

            switch (true) {
                case isbn.includes(query):
                    row.style.display = ''; // إظهار الصف
                    visibleRows++; // زيادة العداد إذا كان الصف مرئيًا
                    break;
                    case title.includes(query):
                        row.style.display = ''; // إظهار الصف
                        visibleRows++; // زيادة العداد إذا كان الصف مرئيًا
                    break;
                    case author.includes(query):
                        row.style.display = ''; // إظهار الصف
                        visibleRows++; // زيادة العداد إذا كان الصف مرئيًا
                        break;
                        default:
                            row.style.display = 'none'; // إخفاء الصف
                            break;
                        }
                        
                    });
                    
                    // عرض أو إخفاء رسالة "لا توجد نتائج"
                    const noResultsRow = document.getElementById('no-results-row');
                    if (visibleRows === 0) {
                        noResultsRow.style.display = 'table-row'; // إظهار الرسالة
                    } else {
                        noResultsRow.style.display = 'none'; // إخفاء الرسالة
                    }
                });
                
            </script> -->
            <script>
            document.querySelector('.Cherche-input').addEventListener('input', function () {
                const query = this.value.toLowerCase();
                const filterOption = document.querySelector('.Cherche').value; // تحديد خيار البحث
                const rows = document.querySelectorAll('tbody tr:not(#no-results-row)');
                let visibleRows = 0;

                rows.forEach(row => {
                    const title = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const isbn = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                    const author = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

                    let matches = false;
                    if (filterOption === 'َAll') {
                        // البحث في جميع الأعمدة
                        matches = isbn.includes(query) || title.includes(query) || author.includes(query);
                    } else if (filterOption === 'ISBN') {
                        matches = isbn.includes(query);
                    } else if (filterOption === 'Auteur') {
                        matches = author.includes(query);
                    } 
                    else  if (filterOption === 'Titre') {
                        matches = title.includes(query);
                    };

                    if (matches || query === '') { // إظهار الصف إذا كان النص فارغًا
                        row.style.display = ''; // إظهار الصف
                        visibleRows++;
                    } else {
                        row.style.display = 'none'; // إخفاء الصف
                    }
                });

                const noResultsRow = document.getElementById('no-results-row');
                noResultsRow.style.display = visibleRows === 0 ? 'table-row' : 'none';
            });
            </script>
<script>
            // if (isbn.includes(query)) {
            //     row.style.display = ''; // إظهار الصف
            //     visibleRows++; // زيادة العداد إذا كان الصف مرئيًا
            // } else {
            //     row.style.display = 'none'; // إخفاء الصف
            // };
            // if (title.includes(query) || isbn.includes(query) || author.includes(query)) {
            //     row.style.display = ''; // إظهار الصف
            //     visibleRows++; // زيادة العداد إذا كان الصف مرئيًا
            // } else {
            //     row.style.display = 'none'; // إخفاء الصف
            // };
            // if (author.includes(query)) {
            //     row.style.display = ''; // إظهار الصف
            //     visibleRows++; // زيادة العداد إذا كان الصف مرئيًا
            // } else {
            //     row.style.display = 'none'; // إخفاء الصف
            // }
</script>

<?php include('script.php');?>
</body>

</html>