<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASEURL . 'css/home.css' ?>">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-semibold" href="#">Member</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <?php if ($data['title'] == 'Home') : ?>
          <a class="nav-link active" aria-current="page" href="<?= BASEURL . '' ?>">Home</a>
            <?php else : ?>
          <a class="nav-link" href="<?= BASEURL . '' ?>">Home</a>
            <?php endif; ?>
        </li>
        <li class="nav-item">
             <?php if ($data['title'] == 'Anggota') : ?>
          <a class="nav-link active" aria-current="page" href="<?= BASEURL . 'anggota' ?>">Anggota</a>
            <?php else : ?>
          <a class="nav-link" href="<?= BASEURL . 'anggota' ?>">Anggota</a>
            <?php endif; ?>
        </li>
        <li class="nav-item">
          <a onclick="return confirm('Apakah kamu yakin untuk logout')" href="<?= BASEURL . 'login/logout/' ?>" class="text-danger nav-link">Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>