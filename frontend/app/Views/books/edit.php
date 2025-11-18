<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Buku</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { background-color: #f4f6f9; font-family: 'Poppins', sans-serif; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; }
        /* Header diganti warna oranye/warning agar beda dikit dengan create */
        .header-gradient { background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); color: white; padding: 20px 30px; }
        .form-label { font-weight: 600; color: #555; font-size: 0.9rem; }
        .form-control, .form-select { border-radius: 10px; padding: 12px 15px; border: 1px solid #e0e0e0; }
        .form-control:focus { border-color: #fda085; box-shadow: 0 0 0 3px rgba(253, 160, 133, 0.2); }
        
        .btn-update {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            border: none; padding: 12px 30px; border-radius: 50px;
            font-weight: 600; color: white; width: 100%; transition: transform 0.2s;
        }
        .btn-update:hover { transform: translateY(-2px); color: white; opacity: 0.9; }
        .btn-back { background-color: rgba(255,255,255,0.2); color: white; border-radius: 50px; padding: 5px 20px; text-decoration: none; }
        .btn-back:hover { background-color: rgba(255,255,255,0.4); color: white; }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                
                <div class="card">
                    <div class="header-gradient d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1 fw-bold"><i class="bi bi-pencil-square me-2"></i>Edit Data Buku</h4>
                            <small>Perbarui informasi buku di bawah ini</small>
                        </div>
                        <a href="<?= base_url('/') ?>" class="btn-back">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>

                    <div class="card-body p-5">
                        <form action="<?= base_url('book/update/'.$book['id']) ?>" method="post">
                            
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Judul Buku</label>
                                    <input type="text" name="judul" class="form-control" value="<?= $book['judul'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" value="<?= $book['pengarang'] ?>" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" value="<?= $book['penerbit'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tahun Terbit</label>
                                    <input type="number" name="tahun_terbit" class="form-control" value="<?= $book['tahun_terbit'] ?>" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Jumlah Halaman</label>
                                    <input type="number" name="jumlah_halaman" class="form-control" value="<?= $book['jumlah_halaman'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ISBN</label>
                                    <input type="text" name="isbn" class="form-control" value="<?= $book['isbn'] ?>" required>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <label class="form-label">Kategori</label>
                                    <select name="kategori" class="form-select">
                                        <option value="Fiksi" <?= $book['kategori'] == 'Fiksi' ? 'selected' : '' ?>>Fiksi</option>
                                        <option value="Non-Fiksi" <?= $book['kategori'] == 'Non-Fiksi' ? 'selected' : '' ?>>Non-Fiksi</option>
                                        <option value="Komik" <?= $book['kategori'] == 'Komik' ? 'selected' : '' ?>>Komik</option>
                                        <option value="Sains" <?= $book['kategori'] == 'Sains' ? 'selected' : '' ?>>Sains</option>
                                        <option value="Teknologi" <?= $book['kategori'] == 'Teknologi' ? 'selected' : '' ?>>Teknologi</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="Tersedia" <?= $book['status'] == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                                        <option value="Dipinjam" <?= $book['status'] == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-update shadow">
                                    <i class="bi bi-check-circle-fill me-2"></i>Perbarui Data
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>