<?php 
// Appel du fichier (qui me créer un bug : no such file in directory alors que je pense que j'appelle le bon endroit) require_once '../../functions/newsletter.php'; 
?>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content 
    j'ai éssayé de mettre une case pour le mail et pour envoyer notre mail pour la newsletter si on est pas déjà inscrit -->
        <h5 class="text-uppercase">Footer Content</h5>

            <?php if($newsletterexist == 0) { ?>
            <form method="POST">
                <label>Adresse e-mail</label><br />
                <input type="email" name="newsletter" /><br /><br />
                <input type="submit" name="newsletterform" value="Envoyer"/>
            </form>
            <?php } else { ?>
            <label>Adresse e-mail</label><br />
            <input type="email" name="newsletter" disabled/><br /><br />
            <?php } ?>
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->