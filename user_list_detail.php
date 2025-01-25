<?php 
    require_once 'components/connection.php';

    require_once 'components/header.php';
?>

    <section id="page">
        <div class="container">
            <div class="container-header row">
                <div class="col-12 text-center">
                    <h2>Ma liste en détail</h2>
                    <h3>Liste [Année] pour [Prénom]</h3>
                </div>
                <hr>
            </div>
            <div class="wishlist">
                <div class="row mt-2">
                    <div class="col-12 mb-2">
                        <div class="card d-flex flex-md-row align-items-center">
                            <p>zkkf,</p>
                        </div>
                    </div>
                    <div class="col-12 text-center new-list-btn">
                        <input type="submit" class="btn" name="newList" data-bs-toggle="modal" data-bs-target="#AddNewListModal" value="+ Nouveau cadeau">
                        <!-- Fenêtre modale -->
                        <div class="modal fade" id="AddNewListModal" tabindex="-1" aria-labelledby="AddNewListModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addWishlist">Ajouter un cadeau</h5>
                                        <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="components/process.php">
                                            <div class="form-floating my-4">
                                                <input type="text" class="form-control" id="floatingInput" name="giftTitle" placeholder="Nom du cadeau" aria-label="title">
                                                <label for="floatingInput">Nom du cadeau</label>
                                            </div>
                                            <div class="form-floating my-4">
                                                <input type="text" class="form-control" id="floatingInput" name="giftDescription" placeholder="Description du cadeau" aria-label="description">
                                                <label for="floatingInput">Description du cadeau</label>
                                            </div>
                                            <div class="form-floating my-4">
                                                <input type="text" class="form-control" id="floatingInput" name="giftUrl" placeholder="Lien du cadeau" aria-label="link">
                                                <label for="floatingInput">Copier le lien du cadeau</label>
                                            </div>
                                            <div class="form-floating my-4">
                                                <input type="text" class="form-control" id="floatingInput" name="giftImage" placeholder="Image du produit" aria-label="image">
                                                <label for="floatingInput">Copier le lien de l'image</label>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <input type="submit" class="btn btn-success text-center" name="createGift" value="Ajouter le cadeau">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Première carte -->
                    <div class="col-12 mb-2">
                        <div class="card d-flex flex-md-row align-items-center">
                            <!-- Image -->
                            <div class="col-md-2">
                                <img src="https://www.king-jouet.com/fstrz/r/s/images.king-jouet.com/6/gu887021_6.jpg?frz-v=4213" class="img-fluid rounded-start" style="max-width: 100px;">
                            </div>
                            <!-- Contenu -->
                            <div class="col-md-8 text-center mt-2 mt-md-0">
                                <h5 class="card-title">[Numéro] Micro lumineux Pat'Patrouille</h5>
                                <div class="card-body">
                                    <p class="card-text">Avec le micro lumineux Pat'Patrouille votre enfant va se transformer en chanteur !</p>
                                    <p class="card-url">Lien</p>
                                </div>
                            </div>
                            <!-- Bouton -->
                            <div class="col-md-2 text-center mt-2 mt-md-0">
                                <button class="btn offer-button w-100" data-status="available">Offrir ce cadeau</button>
                                <a href="modif_list.php" class="btn">Modifier</a>
                                <a href="suppr_list.php" class="btn">Supprimer</a>
                            </div>
                        </div>
                    </div>
                    <!-- Fin de la première carte -->
                    <div class="col-12 mb-2">
                        <div class="card d-flex flex-md-row align-items-center">
                            <!-- Image -->
                            <div class="col-md-2">
                                <img src="https://www.king-jouet.com/fstrz/r/s/images.king-jouet.com/6/gu887021_6.jpg?frz-v=4213" class="img-fluid rounded-start" style="max-width: 100px;">
                            </div>
                            <!-- Contenu -->
                            <div class="col-md-8 text-center mt-2 mt-md-0">
                                <h5 class="card-title">[Numéro] Micro lumineux Pat'Patrouille</h5>
                                <div class="card-body">
                                    <p class="card-text">Avec le micro lumineux Pat'Patrouille votre enfant va se transformer en chanteur !</p>
                                    <p class="card-url">Lien</p>
                                </div>
                            </div>
                            <!-- Bouton -->
                            <div class="col-md-2 text-center mt-2 mt-md-0">
                                <button class="btn offer-button w-100" data-status="offered">Déjà offert</button>
                                <a href="modif_list.php" class="btn">Modifier</a>
                                <a href="suppr_list.php" class="btn">Supprimer</a>
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