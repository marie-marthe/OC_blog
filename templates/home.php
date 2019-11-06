
<?php $this->title = "Accueil";
include('_head_page.php');

use App\src\model\Article; ?>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_account'); ?>
<?php
if ($this->session->get('pseudo')) {
?>
<a href="../public/index.php?route=logout">Déconnexion</a>
<a href="../public/index.php?route=profile">Profil</a>
<?php if($this->session->get('role') === 'admin') 

{ 
    ?>
    <a href="../public/index.php?route=administration">Administration</a>
    <a href="../public/index.php?route=addArticle">Nouvel article</a>
    
    <?php
} else {
?>
<a href="../public/index.php?route=register">Inscription</a>
<a href="../public/index.php?route=login">Connexion</a>

}
}
<?php
$articles = new Article();

foreach ($articles as $article)
{
    ?>
    <div>
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
    </div>
    <br>

    <?php
}
?>
<?php include('_footer_page.php');
?>