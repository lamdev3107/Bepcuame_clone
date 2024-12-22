<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
        Cập nhật danh mục
        </h6>
    </div>
    <div class="card-body">          
        <?php if (isset($_COOKIE['noti-type'])) { ?>
            <?php if ($_COOKIE['noti-type']=='success') { ?>
                <div class="alert alert-success">
                    <?= $_COOKIE['noti-message'] ?>
                </div>
            <?php } ?>
            <?php if ($_COOKIE['noti-type']=='error') { ?>
                <div class="alert alert-danger">
                    <?= $_COOKIE['noti-message'] ?>
                </div>
            <?php } ?>
        <?php } ?>
        <hr>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <form action="dashboard/promotion/update/?id=<?=$data['id']?>" method="POST" role="form" enctype="multipart/form-data">
                <input disabled name="id" value="<?= $data['id'] ?>">
                <div class="form-group">
                    <label for="">Tên khuyến mãi</label>
                    <input type="text" class="form-control" id="" placeholder="" name="TenKM" value="<?= $data['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Loại khuyến mãi</label>
                    <input type="text" class="form-control" id="" placeholder="" name="LoaiKM" value="<?= $data['type'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Giá trị Khuyến mãi</label>
                    <input type="text" class="form-control" id="" placeholder="" name="GiaTriKM" value="<?= $data['value'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select id="" name="status" class="form-control">
                            <option <?= ($data['status'] == '0')?'selected':''?> value="0"> Ẩn</option>
                            <option <?= ($data['status'] == '1')?'selected':''?> value="1"> Hiện</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </table>
    </div>
</div>