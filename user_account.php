<?php 
    require_once 'components/header.php';  
    require_once 'components/connection.php';
    session_start();
    // Vérifier qu'un utilisateur est bien connecté 
    if (!isset($_SESSION['user_id'])) {
        header('Location: authentification.php'); // Renvoie vers la page de connexion
        exit;
    }

    // Vérification du formulaire de changement de mot de passe
    if (isset($_POST['changePassword'])) {
        $current_password = trim($_POST['current_password']);
        $new_password = trim($_POST['new_password']);
        $confirm_password = trim($_POST['confirm_password']);

        $user_id = $_SESSION['user_id'];
        // Vérifier que tous les champs requis sont remplis
        if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
            die("Tous les champs doivent être remplis");
        }
        // Vérifier la concordance des mots de passe
        if ($new_password !== $confirm_password) {
            die("Les nouveaux mots de passe ne correspondent pas");
        }
        // Récupérer le mot de passe actuel
        $stmt = $conn->prepare("SELECT password FROM user WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($current_password, $user['password'])) {
            die("Le mot de passe actuel saisi est incorrect");
        }

        // Mise à jour nouveau mot de passe
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_stmt = $conn->prepare("UPDATE user SET password = :new_password WHERE user_id = :user_id");
        $update_stmt->bindParam(':new_password', $hashed_password, PDO::PARAM_STR);
        $update_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            if ($update_stmt->execute()) {
                echo "<script>document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('changePasswordModal').style.display = 'block';
                    });
                    </script>";
            }
    }
?>
    <section id="page">
        <div class="container">
            <div class="container-header row">
                <div class="col-12 text-center">
                    <h2>Mon compte</h2>
                    <hr>
                </div>
            </div>
            <!-- Ajout sous forme de cartes -->
            <div class="wishlist">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Informations personnelles</h4>
                            <hr>
                            <p class="card-text">Prénom : <?= htmlspecialchars($_SESSION['user_firstname']) ?></p>
                            <p class="card-text">Nom : <?= htmlspecialchars($_SESSION['user_lastname']) ?></p>
                            <p class="card-text">Adresse mail : <?= htmlspecialchars($_SESSION['email']) ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">            
                    <div class="card">
                        <div class="card-body">
                            <h3>Changer mon mot de passe</h3>
                            <form class="row g-3" id="account-form" method="POST" name="changePassword" action="user_account.php">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="current_password" id="floatingPassword" placeholder="Mot de passe" required>
                                    <label for="floatingPassword"><i class="fa-solid fa-key"></i>Mot de passe actuel</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="new_password" id="floatingPassword" placeholder="Mot de passe" required>
                                    <label for="floatingPassword"><i class="fa-solid fa-key"></i>Nouveau mot de passe</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="confirm_password" id="floatingPassword" placeholder="Confirmation du nouveau mot de passe" required>
                                    <label for="floatingPassword"><i class="fa-solid fa-key"></i>Confirmation du mot de passe</label>
                                </div>
                                <div class="col-12 text-center">
                                    <input type="submit" class="btn w-auto" name="changePassword" data-bs-toggle="modal" data-bs-target="#changePasswordModal" value="Changer le mot de passe">
                                    <!-- Fenêtre modale -->
                                    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p>Le mot de passe a été modifié</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn close" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                
                            </form>
                        </div> 
                    </div>              
                </div>
                <hr>
                <div class="col-12 text-center new-list-btn">
                    <a href="user_viewMylists.php"><button class="btn me-4 w-auto">Voir mes listes</button></a>
                    <a href="logout.php" id="logout"><button class="btn">Se déconnecter</button></a>
                </div>
            </div>
        </div>
    </section>
<?php 
    require_once 'components/footer.php';
?>