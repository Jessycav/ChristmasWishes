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

    // Affichage des listes
    $stmt = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Informations avec les titres
    
    // Gérer les actions POST pour le CRUD
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add_list'])) {
            $wishlist_year = filter_var($_POST['wishlist_year'], FILTER_VALIDATE_INT);
            $wishlist_recipient = htmlspecialchars(trim($_POST['wishlist_recipient']), ENT_QUOTES, 'UTF-8');

            if ($wishlist_year && $wishlist_recipient) {
                $sqlAddList = "INSERT INTO wishlist (user_id, wishlist_year, wishlist_recipient) VALUES (:user_id, :wishlist_year, :wishlist_recipient)";
                $stmt = $conn->prepare($sqlAddList);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':wishlist_year', $wishlist_year, PDO::PARAM_INT);
                $stmt->bindParam(':wishlist_recipient', $wishlist_recipient, PDO::PARAM_STR);
                $stmt->execute();
                $_SESSION['message'] = "Liste ajoutée avec succès";
            }
        } elseif (isset($_POST['update_list'])) {
            $wishlist_id = $_POST['wishlist_id'];
            $wishlist_year = filter_var($_POST['wishlist_year'], FILTER_VALIDATE_INT);
            $wishlist_recipient = htmlspecialchars(trim($_POST['wishlist_recipient']), ENT_QUOTES, 'UTF-8');

            if ($wishlist_id && $wishlist_year && $wishlist_recipient) {
                $sqlUpdateList = "UPDATE wishlist SET wishlist_year = :wishlist_year, wishlist_recipient = :wishlist_recipient WHERE wishlist_id = :wishlist_id AND user_id = :user_id";
                $stmt = $conn->prepare($sqlUpdateList);
                $stmt->bindParam(':wishlist_year', $wishlist_year, PDO::PARAM_INT);
                $stmt->bindParam(':wishlist_recipient', $wishlist_recipient, PDO::PARAM_STR);
                $stmt->execute([$wishlist_year, $wishlist_recipient, $wishlist_id, $user_id]);
                $_SESSION['message'] = "Liste mise à jour avec succès";
            }
        } elseif (isset($_POST['delete_list'])) {
            $wishlist_id = $_POST['wishlist_id'];
            
            if($wishlist_id) {
                $sqlDeleteList = "DELETE FROM wishlist WHERE wishlist_id = :wishlist_id AND user_id = :user_id";
                $stmt = $conn->prepare($sqlDeleteList);        
                $stmt->execute([$wishlist_id, $user_id]);
                $_SESSION['message'] = "Liste supprimée avec succès";
            }
        }
        header('Location: user_viewMylists.php');
        exit;
    }
?>
    <section id="page">
        <div class="container">
            <div class="container-header row">
                <div class="col-12 text-center">
                    <h2>Mes listes</h2>
                    <hr>
                </div>
            </div>
            <div class="wishlist">
                <div class="row row-cols-lg-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <table class="table">
                            <thead>
                                <th>Année</th>
                                <th>Prénom du destinataire</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php 
                                //Boucle sur la variable result
                                foreach($result as $wishlist) {
                                ?>
                                    <tr>
                                        <td><?= htmlspecialchars($wishlist['wishlist_year']) ?></td>
                                        <td><?= htmlspecialchars($wishlist['wishlist_recipient']) ?></td>
                                        <td>
                                            <a href="user_list_detail.php?wishlist_id=<?= $wishlist['wishlist_id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>                        
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
                                                    <input type="text" class="form-control" id="floatingInput" name="wishlist_year" placeholder="Year" aria-label="Year">
                                                    <label for="floatingInput">Année</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInput" name="wishlist_recipient" placeholder="First name" aria-label="First name">
                                                    <label for="floatingInput">Prénom</label>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success text-center" name="add_list">Ajouter la liste</button>
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
        </div>
    </section>

<?php 
    require_once 'components/footer.php';
?>