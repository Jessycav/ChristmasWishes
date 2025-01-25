<?php 
    require_once 'components/header.php';
    require_once 'components/connection.php';
    session_start();
    // Vérifier qu'un utilisateur est bien connecté 
    if (!isset($_SESSION['user_id'])) {
        header('Location: authentification.php'); // Renvoie vers la page de connexion
        exit;
    }

    $user_id = $_SESSION['user_id'];

    // Ajout d'une nouvelle liste
    if (isset($_POST['add_list'])) {
        $wishlist_year = $_POST['wishlist_year'];
        $wishlist_recipient = $_POST['wishlist_recipient'];

        $sqlAddList = "INSERT INTO wishlist (user_id, wishlist_year, wishlist_recipient) VALUES (:user_id, :wishlist_year, :wishlist_recipient)";
        $stmt = $conn->prepare($sqlAddList);
        $stmt->execute([$user_id, $$wishlist_year, $wishlist_recipient]);
    }

    // Mise à jour d'une liste existante
    if (isset($_POST['update_list'])) {
        $wishlist_id = $_POST['wishlist_id'];
        $wishlist_year = $_POST['wishlist_year'];
        $wishlist_recipient = $_POST['wishlist_recipient'];

        $sqlUpdateList = "UPDATE wishlist SET wishlist_year = :wishlist_year, wishlist_recipient = :wishlist_recipient WHERE wishlist_id = :wishlist_id AND user_id = :user_id";
        $stmt = $conn->prepare($sqlAddList);
        $stmt->execute([$wishlist_year, $wishlist_recipient, $wishlist_id, $user_id]);
    }

    // Suppression d'une liste
    if (isset($_POST['delete_list'])) {
        $wishlist_id = $_POST['wishlist_id'];

        $sqlDeleteList = "DELETE FROM wishlist WHERE wishlist_id = :wishlist_id AND user_id = :user_id";
        $stmt = $conn->prepare($sqlDeleteList);
        $stmt->execute([$wishlist_id, $user_id]);
    }

    // Récupération des listes de l'utilisateur
    $sqlAllLists = "SELECT * FROM wishlist WHERE user_id = :user_id";
    $stmt->execute([$user_id]);
    $wishlist = $stmt->fetchAll();
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
                                        <form method="POST" action="components/process.php">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Year" aria-label="Year">
                                                <label for="floatingInput">Année</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="First name" aria-label="First name">
                                                <label for="floatingInput">Prénom</label>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <input type="submit" class="btn btn-success text-center" name="createList" value="Ajouter la liste">
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