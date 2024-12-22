<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
        Chi tiết danh mục
        </h6>
    </div>
    <div class="card-body overflow-auto">    
        <div class="table " width="100%" cellspacing="0" class="mb-4">
            <h5 style="font-weight: 700" >Mã danh mục: <span style="font-weight:400; "><?= $collection['id'] ?> </span></h5>
            <h5 style="font-weight: 700">Tên danh mục: <span style="font-weight:400; "><?= $collection['name'] ?> </span></h5>
            <h5 style="font-weight: 700">Slug: <span style="font-weight:400; "><?= $collection['slug'] ?> </span></h5>
           
                
            <div class="d-flex justify-content-start align-items-start">
                 <h5 style="font-weight: 700" class="d-inline-block">Hình ảnh: 
                <?php if($collection['image']!== ""){ ?>
                        <img class="ml-2 mb-2 d-inline-block" style="height:100px" src="<?= $collection['image'] ?>" />
                    <?php } else {?>
                        <span style="font-weight:400; font-style: italic;">Không có hình ảnh</span>
                    <?php }?>
                </h5>
                
            </div>
            
            <h5 style="font-weight: 700">Mô tả:
                 <?php if($collection['description']!== ""){ ?>
                     <span style="font-weight:400; "><?= $collection['description'] ?> </span>
                <?php } else {?>
                     <span style="font-weight:400; font-style: italic ">Không có mô tả </span>
                <?php }?>
            
           </h5>
            <h5 style="font-weight: 700">Trạng thái <span style="font-weight:400; "><?= $collection['status'] == 1 ? "Hiển thị" : "Ẩn" ?> </span></h5>
            <div class="d-flex justify-content-between align-items-start">
                 <h5 style="font-weight: 700; margin:0">Sản phẩm: 
                    <span style="font-weight:400; "><?= count($products) ?> sản phẩm </span>
                 </h5>
                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['auth_id'] == 2 || $_SESSION['user']['auth_id'] == 3 )) { ?>
                    <button  type="button" class="btn btn-primary" data-toggle="modal"data-target="#exampleModalCenter">Thêm  mới sản phẩm vào danh mục</button>
                <?php } ?>
            </div>

            
        </div>

        <table class="table table-bordered table-striped  "  width="100%" cellspacing="0" >
            <thead>
                <tr>
                <th scope="col">Mã sản phẩm</th>
                <th scopt="col">Tên sản phẩm</th>
                <th scopt="col">Slug</th>
                <th scope="col">Hình ảnh </th>
                <th scope="col">Giá thành</th>
                <th scope="col">Số lượng</th>
                <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($products) > 0) { ?>
                    <?php foreach ($products as $row) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['slug'] ?></td>
                        <td>
                            <img src="<?= $row['image1'] ?>" height="60px">
                        </td>
                        <td><?= number_format($row['price']) ?>đ</td>
                        <td><?= $row['stock'] ?></td>
                        <td class="" style="padding: 8px 20px; width: 100px">
                            <a href="dashboard/collection/deleteProductFromCollection/?productId=<?= $row['id'] ?>&collectionId=<?=$collection['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa sản phẩm khỏi danh mục này ?');" type="button" style="white-space: nowrap;width: fit-content; height: 40px" class="btn btn-danger">Xóa khỏi danh mục</a>
                        
                        </td>
                    </tr>
                    <?php } ?>
                <?php } else {?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Không có sản phẩm nào phù hợp.</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        </script>
    </div>
</div> 
<?php require_once('addProductModal.php') ?>


 
