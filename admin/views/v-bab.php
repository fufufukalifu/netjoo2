<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
<!-- konten -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title">Daftar BAB Mata Pelajaran</h5>
                <!-- Trigger the modal with a button -->
                <button title="Tambah Data" type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal" style="margin-top:-30px;" ><i class="ico-plus"></i></button>
                <a href="<?= base_url('index.php/admin/daftartingkatpelajaran') ?>" class="btn btn-default pull-right" style="margin-top:-30px;">Kembali</a>
                <br>
                <!--<a data-toggle="modal" class="btn btn-default pull-right"  "  data-target="#myModal">Tambah</a>-->
            </div>
            <table class="table table-striped" id="zero-configuration" style="font-size: 13px">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Judul BAB</th>
                        <th>Deskripsi BAB</th>
                        <th>SUB BAB</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($babs as $bab): ?>
                        <tr>
                            <td class="text-center"><?= $bab->id ?></td>
                            <td><?= $bab->judulBab ?></td>
                            <td><?= $bab->keterangan ?></td>
                            <td>link sub bab</td>
                            <td class="text-center">
                                <button type="button" id="rubahBtn" class="btn btn-default" data-toggle="modal" data-id="<?= $bab->id ?>" data-judul="<?= $bab->judulBab ?>" data-ket="<?= $bab->keterangan ?>" title="Rubah Data"><i class="ico-file5"></i></button>
                                <button type="button" id="hapusBtn" class="btn btn-default" data-toggle="modal" data-id="<?= $bab->id ?>" data-nama="<?= $bab->judulBab ?>" title="Hapus Data"><i class="ico-remove"></i></button>
                            </td>
                            <!-- Modal -->
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data BAB Mata Pelajaran</h4>
            </div>
            <form action="<?= base_url('index.php/admin/tambahbabMP') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="ico-notebook"></i></span>
                        <input name="idtmp" value="<?= $this->uri->segment(4); ?>" type="hidden">
                        <input name="nmmp" value="<?= $this->uri->segment(3); ?>" type="hidden">
                        <input name="judulBab" type="text" class="form-control" placeholder="Judul BAB" required> <br>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="ico-file-upload"></i></span>
                        <textarea class="form-control" name="deskbab" value=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalRubah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rubah Data BAB Pelajaran</h4>
            </div>
            <form action="<?= base_url('index.php/admin/rubahbabMP') ?>" method="post">
                <div class="modal-body rubah">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="ico-notebook"></i></span>
                        <input name="idtmp" value="<?= $this->uri->segment(4); ?>" type="hidden">
                        <input name="nmmp" value="<?= $this->uri->segment(3); ?>" type="hidden">
                        <input id='idrubah' name="idrubah" type="hidden">
                        <input id="judulBab" name="judulBab" type="text" class="form-control" placeholder="Judul BAB" required> <br>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="ico-file-upload"></i></span>
                        <textarea id="desk" class="form-control" name="deskbab" required>
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yakin</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalHapus" class="modal fade" role="dialog">
    <div class="modal-dialog">
        Modal content
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Data Bab Pelajaran </h4>
            </div>
            <form action="<?= base_url('index.php/admin/hapusbabMP') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group input-group">
                        <span><h4 class="text-center">Yakin akan menghapus data mata pelajaran</h4></span>  
                        <input type="text" hidden="true" name="id" id="idMP" value=""/>
                        <input name="idtmp" value="<?= $this->uri->segment(4); ?>" type="hidden">
                        <input name="nmmp" value="<?= $this->uri->segment(3); ?>" type="hidden">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yakin</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#rubahBtn", function () {
        var id = $(this).data('id');
        var judul = $(this).data('judul');
        var ket = $(this).data('ket');
        $(".rubah #idrubah").val(id);
        $(".rubah #judulBab").val(judul);
        document.getElementById("desk").value = ket;
//        document.getElementById("deskbab").value = ket;
//        $(".rubah #desk").val(ket);
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        $('#modalRubah').modal('show');
    });

    $(document).on("click", "#hapusBtn", function () {
        var Id = $(this).data('id');
        $(".modal-body #idMP").val(Id);
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        $('#modalHapus').modal('show');
    });
</script>