<?php 
    require_once 'components/connection.php';

    require_once 'components/header.php';
?>
    <section id="page">
        <div class="container">
            <div class="container-header row">
                <div class="col-12 text-center">
                    <h2>Mon compte</h2>
                    <hr>
                </div>
                <!-- Ajout sous forme de cartes -->
                <div class="wishlist">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Informations personnelles</h4>
                                <hr>
                                <p class="card-text">Prénom</p>
                                <p class="card-text">Nom</p>
                                <p class="card-text">Adresse mail</p>
                                <p class="card-text">Mot de passe</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">            
                        <div class="card">
                            <div class="card-body">
                                <h3>Changer mon mot de passe</h3>
                                <form class="row g-3"id="account-form" method="POST" action="myAccount.php">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" required>
                                        <label for="floatingPassword">Mot de passe actuel</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" required>
                                        <label for="floatingPassword">Nouveau mot de passe</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Confirmation du nouveau mot de passe" required>
                                        <label for="floatingPassword">Confirmation du mot de passe</label>
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
                                                        <button type="button" class="btn" data-bs-dismiss="modal">Fermer</button>
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
                        <a href="user_account.php?logout=1" id="logout"><button class="btn">Se déconnecter</button></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
<?php 
    require_once 'components/footer.php';
?>