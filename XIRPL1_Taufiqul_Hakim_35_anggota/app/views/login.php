<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASEURL . 'css/home.css' ?>">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container d-flex justify-content-center mt-5">
    <div style="width: 400px; background-color: white;" class="shadow p-4 rounded">
        <h1 id="judul">Login</h1>
        <hr>
        <form action="<?= BASEURL . 'login/proses' ?>" method="post"> 
            <div class="mb-3">
                <label for="username" class="form-label">Useraname</label>
                <input type="text" class="form-control" name="username" id="username"
                    placeholder="Masukan Username" required />
            </div>
            <div class="mb-4">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" id="pass"
                    placeholder="Masukan Password" required/>
            </div>
            <div>
                <button class="btn btn-primary w-100" type="submit" id="sub">Submit</button>
            </div>
        </form>
        <div id="hal"></div>
    </div>
</div>
</body>
</html>