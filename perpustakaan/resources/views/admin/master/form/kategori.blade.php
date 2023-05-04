<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Kategori</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Kategori</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ 'KK-'.$kd }}"
                                    readonly required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kategori</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="Masukkan Kategori" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>