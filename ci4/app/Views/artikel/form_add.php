<?= $this->include('template/admin_header'); ?>

<h1>Admin Portal Berita</h1>

<div class="tabs">
    <a href="<?= base_url('/admin/artikel'); ?>">Dashboard</a>
    <a href="<?= base_url('/admin/artikel'); ?>">Artikel</a>
    <a href="<?= base_url('/admin/artikel/add'); ?>" class="active">Tambah Artikel</a>
</div>

<div class="content">
    <h2>Tambah Artikel</h2>
    
    <form action="" method="post">
        <p>
            <input type="text" name="judul" placeholder="Judul Artikel">
        </p>
        
        <p>
            <textarea name="isi" cols="50" rows="10" placeholder="Isi Artikel"></textarea>
        </p>
        
        <p>
            <input type="submit" value="Kirim" class="btn">
        </p>
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
        color: #333;
        font-size: 1.5em;
    }
    
    input[type="text"], 
    textarea {
        width: 100%;
        max-width: 500px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }
    
    textarea {
        resize: vertical;
    }
    
    .btn {
        padding: 8px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }
    
    .btn:hover {
        background-color: #0056b3;
    }
    
    .caption {
        margin-top: 10px;
        color: #666;
        font-style: italic;
        text-align: center;
    }
</style>

<?= $this->include('template/admin_footer'); ?>