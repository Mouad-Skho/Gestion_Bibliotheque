<?php 
$page="Historique";
include("../../shared/libs/bd.php");
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
            <div class="col pt-2 bg-content rounded-5">
                <div class="">
                    <h2></h2>
                </div>
                <div class="content">
                    <div class="px-2">
                        <h2 class="mt-4 fw-medium fs-5">Historique</h2>
                    </div>
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

                        <input type="text" class="form-control me-2" placeholder="Chercher">
                        <button class="btn btn-primary">Chercher</button>

                    </div>
                    <!-- END: Chercher Menu -->
                    <div class="my-5">
                        <div class="container-md">
                            <div class="bg-white rounded-3 overflow-x-scroll">
                                <div class="border-bottom" style="padding:20px">
                                    <h4 class="fw-medium lh-base fs-6 m-0">Historique des emprunts</h4>
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
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">
                                        <div class="col">
                                            <div class="card">
                                                <img src="..\img\71JTYQvrywL._SL1500_.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Retour</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card">
                                                <img src="..\img\9782075128063_1_75.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Retour</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card">
                                                <img src="..\img\9782070581054_1_75.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Retour</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card">
                                                <img src="..\img\9782070360024_1_75.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Retour</button>
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
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Retour</button>

                                                        
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
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Retour</button>

                                                    
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
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Retour</button>

                                                        
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Your Rating</label>
                                <div class="star-rating">
                                    <i class="bi bi-star rating-star" data-rating="1"></i>
                                    <i class="bi bi-star rating-star" data-rating="2"></i>
                                    <i class="bi bi-star rating-star" data-rating="3"></i>
                                    <i class="bi bi-star rating-star" data-rating="4"></i>
                                    <i class="bi bi-star rating-star" data-rating="5"></i>
                                </div>
                                <input type="hidden" id="rating" name="rating" value="0">
                            </div>
                            <div class="mb-3">
                                <label for="review" class="form-label">Your Review</label>
                                <textarea class="form-control" id="review" rows="3" required></textarea>
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
            <script>
// document.addEventListener('DOMContentLoaded', function() {
//   const stars = document.querySelectorAll('.rating-star');
//   const ratingInput = document.getElementById('rating');

//   stars.forEach(star => {
//     star.addEventListener('click', function() {
//       const rating = this.getAttribute('data-rating');
//       ratingInput.value = rating;
//       resetStars();
//       for (let i = 0; i < rating; i++) {
//         stars[i].classList.remove('bi-star');
//         stars[i].classList.add('bi-star-fill');
//       }
//     });
//   });

//   function resetStars() {
//     stars.forEach(star => {
//       star.classList.remove('bi-star-fill');
//       star.classList.add('bi-star');
//     });
//   }
// });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const stars = document.querySelectorAll('.rating-star');
  const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-rating');
            ratingInput.value = rating;
            resetStars();
            for (let i = 0; i < rating; i++) {
                stars[i].classList.remove('bi-star');
                stars[i].classList.add('bi-star-fill');
            }
        });
    
        star.addEventListener('mouseover', function() {
            resetStars();
            const rating = this.getAttribute('data-rating');
            for (let i = 0; i < rating; i++) {
            stars[i].classList.remove('bi-star');
            stars[i].classList.add('bi-star-fill');
            }
        });

        star.addEventListener('mouseout', function() {
            resetStars();
            const currentRating = ratingInput.value;
            for (let i = 0; i < currentRating; i++) {
            stars[i].classList.remove('bi-star');
            stars[i].classList.add('bi-star-fill');
            }
        });
    });
    function resetStars() {
        stars.forEach(star => {
        star.classList.remove('bi-star-fill');
        star.classList.add('bi-star');
        });
    }
});


</script>
</body>

</html>