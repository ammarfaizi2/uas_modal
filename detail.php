<?php
  // Load file koneksi.php
  include "konek.php";
  
  // Ambil data NIS yang dikirim oleh index.php melalui URL



  
  // Query untuk menampilkan data siswa berdasarkan idbuku yang dikirim
  // $query = "SELECT * FROM buku WHERE idbuku='".$idbuku."'";
  // $sql = mysqli_query($kon, $query);  
  // $data = mysqli_fetch_array($sql); 

  // $checked = explode(', ', $data['level']);

  // $query = mysqli_query($kon, "SELECT * FROM buku ORDER BY id DESC");

  ?>

<?php
    include "konek.php";
    if(isset($_POST['idx'])) {
        $id = $_POST['idx']; 
        $tb = mysqli_query($kon,"SELECT * FROM buku WHERE idbuku = $id LIMIT 1;");
        // var_dump("SELECT * FROM buku WHERE idbuku = $id"); exit();
        $result = mysqli_fetch_array($tb);
        $checked = explode(',', str_replace(" ", "", $result['level']));
		?>
        <form action="edit2.php" method="post">
            <input type="hidden" name="idbuku" value="<?php echo $result['idbuku']; ?>">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="<?php echo qq($result['judul']); ?>">
            </div>
            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" class="form-control" name="pengarang" value="<?php echo qq($result['pengarang']); ?>">
            </div>
            <div class="form-group">
                <label>Penerbit:</label>
                <select name="penerbit" id="">
                  <option value="">pilih</option>
                  <?php 
                    foreach (["Andi Offset", "Gramedia", "Tiga Serangkai"] as $v) {
                      ?><option value="<?php print qq($v); ?>"
                        <?php print $result["penerbit"] === $v ? "selected" : ""; ?>>
                        <?php print qq($v); ?>
                        </option><?php
                    }
                  ?>
                </select>
            </div>
            <div class="form-group">
              <label>Jenis:</label>
              <input type="radio" name="jenis" value="komputer" <?php print $result["jenis"]==="komputer"?"checked":"";?>> Komputer
              <input type="radio" name="jenis" value="komputer" <?php print $result["jenis"]==="lainnya"?"checked":"";?>> Lainnya
            </div>
            <div class="form-group">
              <label>Level:</label>
              <input type="checkbox" name="level[]" value="pemula" <?php in_array ('pemula', $checked) ? print "checked" : ""; ?> > pemula
              <input type="checkbox" name="level[]" value="menengah" <?php in_array ('menengah', $checked) ? print "checked" : ""; ?> > menengah
              <input type="checkbox" name="level[]" value="mahir" <?php in_array ('mahir', $checked) ? print "checked" : ""; ?> > mahir  
            </div>
              <input type="hidden" name="halaman" value="<?php print $_POST["halaman"]; ?>">
              <button class="btn btn-primary" type="submit">Update</button>
        </form>     
        <?php 
    }
?>