<?php 
    require_once 'components/header.php';
    require_once 'components/connection.php';
    session_start();
    // Vérifier qu'un utilisateur est bien connecté 
    if (!isset($_SESSION['user_id'])) {
        header('Location: authentification.php'); // Renvoie vers la page de connexion
        exit;
    }
    //Récupérer les cadeaux de la liste
    $stmt = $conn->prepare("SELECT * FROM wishlist WHERE wishlist_id = :wishlist_id");
    $stmt->bindValue(':wishlist_id', $wishlist_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(); 



?>
    <section id="page">
        <div class="container">
            <div class="container-header row">
                <div class="col-12 text-center">
                    <h2>Ma liste en détail</h2>

                    <h3>Liste < [Prénom]</h3>

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

                </div>
            </div>
        </div>
    </section>

<?php 
    require_once 'components/footer.php';
?>