<?php 
    require_once 'components/connection.php';

    require_once 'components/header.php';
?>
    <section id="page">
        <div class="container">
            <div class="container-header row">
                <div class="col-12 text-center">
                    <h2>Mes listes</h2>
                    <hr>
                </div>
            </div>
            <!-- Ajout sous forme de cartes -->
            <div class="wishlist">
                <div class="row row-cols-lg-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste [Année] pour [Prénom]</h4>
                                <hr>
                                <p class="card-text">Voici tous les présents souhaités par [Prénom]</p>
                                <a href="user_list_detail.php" class="btn">Modifier les cadeaux</a>
                                <a href="suppr_list.php" class="btn">Supprimer la liste</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center new-list-btn">
                        <input type="submit" class="btn" name="newList" data-bs-toggle="modal" data-bs-target="#AddNewListModal" value="+ Nouvelle liste">
                        <!-- Fenêtre modale -->
                        <div class="modal fade" id="AddNewListModal" tabindex="-1" aria-labelledby="AddNewListModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addWishlist">Ajouter une nouvelle liste</h5>
                                        <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Year" aria-label="Year">
                                                <label for="floatingInput">Année</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="First name" aria-label="First name">
                                                <label for="floatingInput">Prénom</label>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn text-center">Ajouter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
    require_once 'components/footer.php';
?>