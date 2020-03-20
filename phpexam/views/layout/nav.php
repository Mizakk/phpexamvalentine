<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Utilisateurs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/public/new.php">Nouvel utilisateur</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/public/admin">Administration</a>
      </li>
      <?php
      @session_start();
      if (isset($_SESSION) && $_SESSION['state'] == 'connected') { ?>
        <li class="nav-item">
          <a class="nav-link" href="/admin/logout.php">Déconnexion</a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>
<!-- /NAV -->