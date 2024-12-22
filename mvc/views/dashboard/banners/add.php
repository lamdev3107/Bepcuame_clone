<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
        Thêm mới khuyến mãi
        </h6>
    </div>
    <div class="card-body">            
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <form action="dashboard/banner/add" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type="file" class="form-control" id="" placeholder="" required name="image">
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </table>
    </div>
</div>