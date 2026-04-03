<?= $this->include('template/admin_header'); ?>

<h1>Admin Portal Berita</h1>

<div class="tabs">
    <a href="<?= base_url('/admin/artikel'); ?>">Dashboard</a>
    <a href="<?= base_url('/admin/artikel'); ?>">Artikel</a>
    <a href="<?= base_url('/admin/artikel/add'); ?>">Tambah Artikel</a>
    <a href="#" class="active">Edit Artikel</a>
</div>

<div class="content">
    <h2><?= $title; ?></h2>
    
   
    
    <!-- Form edit artikel -->
    <form action="" method="post">
        <?= csrf_field(); ?>
        
        <div class="form-group">
            <label for="judul">Judul Artikel:</label>
            <input type="text" 
                   name="judul" 
                   id="judul" 
                   class="form-control" 
                   value="<?= old('judul', $artikel['judul']); ?>" 
                   placeholder="Masukkan judul artikel"
                   required>
        </div>
        
        <div class="form-group">
            <label for="isi">Isi Artikel:</label>
            <textarea name="isi" 
                      id="isi" 
                      cols="50" 
                      rows="10" 
                      class="form-control" 
                      placeholder="Masukkan isi artikel"
                      required><?= old('isi', $artikel['isi']); ?></textarea>
        </div>
        
        <div class="form-group button-group">
            <input type="submit" value="Kirim" class="btn btn-primary">
            <a href="<?= base_url('/admin/artikel'); ?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>



<style>
    .tabs {
        margin: 20px 0;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }
    
    .tabs a {
        display: inline-block;
        padding: 8px 16px;
        margin-right: 5px;
        text-decoration: none;
        color: #333;
        border: 1px solid #ddd;
        border-bottom: none;
        border-radius: 4px 4px 0 0;
        background-color: #f8f9fa;
    }
    
    .tabs a.active {
        background-color: #fff;
        border-bottom: 1px solid #fff;
        margin-bottom: -1px;
        font-weight: bold;
        color: #007bff;
    }
    
    .content {
        padding: 20px;
        border: 1px solid #ddd;
        border-top: none;
        background-color: #fff;
    }
    
    h2 {
        margin-top: 0;
        margin-bottom: 20px;
        color: #333;
        font-size: 1.5em;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }
    
    .form-control {
        width: 100%;
        max-width: 500px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 3px rgba(0,123,255,0.3);
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 150px;
    }
    
    .button-group {
        margin-top: 30px;
    }
    
    .btn {
        display: inline-block;
        padding: 8px 20px;
        margin-right: 10px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
    }
    
    .btn-primary {
        background-color: #007bff;
        color: white;
    }
    
    .btn-primary:hover {
        background-color: #0056b3;
    }
    
    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }
    
    .btn-secondary:hover {
        background-color: #5a6268;
    }
    
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
    
    .alert-danger ul {
        margin-left: 20px;
        margin-bottom: 0;
    }
    
    .caption {
        margin-top: 10px;
        color: #666;
        font-style: italic;
        text-align: center;
    }
</style>

<?= $this->include('template/admin_footer'); ?>