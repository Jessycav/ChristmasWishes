<?php 
    require_once 'components/header.php';
    require_once 'components/connection.php';
    session_start();

    // Gestion de l'inscription d'un utilisateur
    if (isset($_POST['register'])) {
        // Récupération et sécurisation des données du formulaire
        $user_firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
        $user_lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        //Préparation de la requête SQL sécurisée
        $sql = "INSERT INTO user (user_firstname, user_lastname, email, password) VALUES (:user_firstname, :user_lastname, :email, :password)";
        $stmt = $conn->prepare($sql);
        // Liaison des paramètres et exécution
        $stmt->bindParam(':user_firstname', $user_firstname, PDO::PARAM_STR);
        $stmt->bindParam(':user_lastname', $user_lastname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription";
    }

    // Gestion de la connexion
    if (isset($_POST['login'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_firstname'] = $user['user_firstname'];
                $_SESSION['user_lastname'] = $user['user_lastname'];
                $_SESSION['email'] = $user['email'];
                header('Location: user_account.php');
                exit;
            } else {
                echo "Email ou mot de passe incorrect";
            }
        } else {
            echo "Adresse email invalide";
        }
    }
?>
    <section id="page">
        <div class="container">
            <!--Titre centré-->
            <div class="container-header row">
                <div class="col-12 text-center">
                    <h2>Mon espace client</h2>
                </div>
                <hr>
            </div>
            <!--Connexion et inscription-->
            <div class="row sm-g-4">
                <!--Section connexion-->
                <div class="col-md-6">            
                    <div class="form-wrapper">
                        <div class="form-section">
                            <h3>CONNEXION</h3>
                            <!--Espace de connexion-->
                            <form method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                                    <label for="floatingInput"><i class="fa-solid fa-envelope"></i>Adresse email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                                    <label for="floatingPassword"><i class="fa-solid fa-key"></i>Mot de passe</label>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="login" class="btn">Se connecter</button>
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
                <!--Section inscription-->
                <div class="col-md-6">            
                    <div class="form-wrapper">
                        <div class="form-section">
                            <h3>INSCRIPTION</h3>
                            <!--Espace d'inscription-->
                            <form method="POST" class="row g-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" name="firstname" placeholder="First name" aria-label="First name">
                                    <label for="floatingInput"><i class="fa-solid fa-user"></i>Prénom</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" name="lastname" placeholder="Last name" aria-label="Last name">
                                    <label for="floatingInput"><i class="fa-solid fa-user"></i>Nom</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                    <label for="floatingInput"><i class="fa-solid fa-envelope"></i>Adresse email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                    <label for="floatingPassword"><i class="fa-solid fa-key"></i>Mot de passe</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword"><i class="fa-solid fa-key"></i>Confirmation du mot de passe</label>
                                </div>
                                <div class="form-floating col-12">
                                    <!-- Bouton fenêtre modale -->
                                    <button type="submit" class="btn" name="register" data-bs-toggle="modal" data-bs-target="#exampleModal">S'inscrire</button>

                                    <!-- Fenêtre modale -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p>Votre inscription est enregistrée !</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">Fermer</button>
                                                    <a href="user_account.php"><button type="button" class="btn">Voir mon compte</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>

<?php 
    require_once 'components/footer.php';
?>