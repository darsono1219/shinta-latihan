<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/plugins/bootstrap-5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Content here -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">
                Rumus Persegi panjang
            </div>
            <div class="card-body">
                <form action="proses.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">panjang</label>
                        <input type="number" name="panjang" class="form-control" placeholder="masukan panjang">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">lebar</label>
                        <input type="number" name="lebar" class="form-control" placeholder="masukan lebar">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">simpan</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>