<div class="container-fluid">
 <div class="row">
 <div class="col-lg-9">
 <?= form_open_multipart('member/ubahprofil'); ?>
 <div class="form-group row">
 <label for="email" class="col-sm-2 col-form-label">Email</label>
 <div class="col-sm-10">
 <input type="text" class="formcontrol" id="email" name="email" value="<?= $email; ?>" readonly>
 </div>
 </div>
 <div class="form-group row">
 <label for="nama" class="col-sm-2 col-formlabel">Nama Lengkap</label>
 <div class="col-sm-10">
 <input type="text" class="formcontrol" id="nama" name="nama" value="<?= $user; ?>">
 <?= form_error('nama', '<small class="text-danger pl3">', '</small>'); ?>
 </div>
 </div>
 <div class="form-group row">
 <div class="col-sm-2">Gambar</div>
 <div class="col-sm-10">
 <div class="row">
 <div class="col-sm-3">
 <img src="<?= base_url('assets/img/profile/') . $image; ?>" class="img-thumbnail" alt="">
 </div>
<div class="col-sm-9">
<div class="custom-file">
 <input type="file" class="custom-fileinput" id="image" name="image">
 <label class="custom-filelabel" for="image">Pilih file</label>
 </div>
 </div>
 </div>
 </div>
 </div>
 <div class="form-group row justify-content-end">
 <div class="col-sm-10">
 <button type="submit" class="btn btn-primary">Ubah</button>
 <button class="btn btn-dark" onclick="window.history.go(-1)"> Kembali</button>
 </div>
 </div>
 </form>
 </div>
 </div>
</div>
<!-- /.container-fluid -->
</div>