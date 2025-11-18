<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* Custom CSS untuk mempercantik */
        body {
            background-color: #f4f6f9; /* Abu-abu sangat muda */
            font-family: 'Poppins', sans-serif;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }

        .header-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); /* Gradasi Ungu ke Biru */
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 25px;
        }

        .btn-add {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            transition: transform 0.2s;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
            color: white;
        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            color: #6c757d;
        }

        .badge-status {
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .action-btn {
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin: 0 2px;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">📚 Library Management</h2>
            <p class="text-muted">Kelola data buku perpustakaan dengan mudah</p>
        </div>

        <div class="card">
            <div class="header-gradient d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0 fw-bold"><i class="bi bi-journal-bookmark-fill me-2"></i>Daftar Buku</h4>
                </div>
                <a href="<?= base_url('book/create') ?>" class="btn btn-add">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Buku
                </a>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="30%">Judul Buku</th>
                                <th width="20%">Pengarang</th>
                                <th width="15%">Kategori</th>
                                <th width="15%">Status</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($books)): ?>
                                <?php foreach($books as $book): ?>
                                <tr>
                                    <td><span class="fw-bold text-secondary">#<?= $book['id'] ?></span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-2">
                                                <div class="fw-bold text-dark"><?= $book['judul'] ?></div>
                                                <small class="text-muted">ISBN: <?= $book['isbn'] ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $book['pengarang'] ?></td>
                                    <td>
                                        <span class="badge bg-light text-primary border border-primary-subtle">
                                            <?= $book['kategori'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if($book['status'] == 'Tersedia'): ?>
                                            <span class="badge bg-success bg-opacity-10 text-success badge-status">
                                                <i class="bi bi-check-circle me-1"></i> Tersedia
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-warning bg-opacity-10 text-warning badge-status">
                                                <i class="bi bi-clock-history me-1"></i> Dipinjam
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('book/edit/'.$book['id']) ?>" class="btn btn-warning text-white action-btn shadow-sm" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="<?= base_url('book/delete/'.$book['id']) ?>" 
                                           class="btn btn-danger action-btn shadow-sm" 
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" 
                                           title="Hapus">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-folder2-open display-1"></i>
                                            <p class="mt-3 mb-0">Belum ada data buku tersedia.</p>
                                            <small>Silakan klik tombol Tambah Buku.</small>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>