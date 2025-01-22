<?php 
    require_once 'components/connection.php';

    require_once 'components/header.php';
?>
    <section id="home">
        <div class="snowfall-container">
            <div class="snowflake"></div>
        </div>
        <div class="main">
            <h1>Ma liste de Noël</h1>
            <h2>Créer une liste de cadeaux de Noël personnalisée</h2>
            <br>
            <p>Grâce à ce site, créer gratuitement votre liste de Noël en y rassemblant toutes vos envies.</p>
            <br>
            <p>Partager facilement votre wishlist avec vos proches !</p>      
            <a href="authentification.php"><button type="submit" class="btn">Commencer ma liste</button></a>
        </div>
    </section>

<?php 
    require_once 'components/footer.php';
?>