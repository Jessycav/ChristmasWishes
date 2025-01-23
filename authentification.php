<?php 
    require_once 'components/connection.php';

    require_once 'components/header.php';
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
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Adresse email</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Mot de passe</label>
                            </div>
                            <div class="col-12">
                                <a href="myAccount.php"><button type="submit" class="btn">Se connecter</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Section inscription-->
                <div class="col-md-6">            
                    <div class="form-wrapper">
                        <div class="form-section">
                            <h3>INSCRIPTION</h3>
                            <!--Espace d'inscription-->
                            <form class="row g-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="First name" aria-label="First name">
                                    <label for="floatingInput">Prénom</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Last name" aria-label="Last name">
                                    <label for="floatingInput">Nom</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Adresse email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Mot de passe</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Confirmation du mot de passe</label>
                                </div>
                                <div class="form-floating col-12">
                                    <!-- Bouton fenêtre modale -->
                                    <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">S'inscrire</button>

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