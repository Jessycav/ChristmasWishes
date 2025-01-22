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
                <!-- Ajout sous forme de cartes -->
                <div class="wishlist">
                    <div class="row row-cols-lg-3">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste [Année] pour [Prénom]</h4>
                                    <hr>
                                    <p class="card-text">Voici tous les présents souhaités par [Prénom]</p>
                                    <a href="list_detail.php" class="btn">Voir les cadeaux</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste [Année] pour [Prénom]</h4>
                                    <hr>
                                    <p class="card-text">Voici tous les présents souhaités par [Prénom]</p>
                                    <a href="list_detail.php" class="btn">Voir les cadeaux</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center new-list-btn">
                            <button class="btn w-auto">+ Nouvelle liste</button>
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