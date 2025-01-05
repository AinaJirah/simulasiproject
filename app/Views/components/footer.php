<!-- MODAL SETTING PROFIL -->
<div id="modalsetprofil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="/profil" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_pengguna" value="<?= session()->get('id_pengguna'); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label">Nama</label>
                                <input type="text" class="form-control" value="<?= session()->get('nama'); ?>" required name="nama">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label">Username</label>
                                <input type="text" class="form-control" value="<?= session()->get('username'); ?>" required name="username">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label">Password</label>
                                <input type="text" class="form-control" name="password" placeholder="Isi untuk mengganti password baru!">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>
<!-- Required Js -->
<script src="/assets/dist/assets/js/vendor-all.min.js"></script>
<script src="/assets/dist/assets/js/plugins/bootstrap.min.js"></script>
<!-- <script src="/assets/dist/assets/js/ripple.js"></script> -->
<script src="/assets/dist/assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="/assets/dist/assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="/assets/dist/assets/js/pages/dashboard-main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>

<script>
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
</script>
</body>

</html>