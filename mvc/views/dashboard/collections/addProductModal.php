<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div style="width: 80vw" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                <!-- <button > -->
                    <a class="close" type="button"  href="dashboard/collection/detail/?id=<?=$collection['id']?>">
                        <span aria-hidden="true">×</span>
                    </a>
                <!-- </button> -->
            </div>
            <div class="modal-body">
                <form  method="GET" action="dashboard/collection/findProductByName" class="d-none d-sm-inline-block  mr-auto  my-2  w-100  navbar-search mb-3">
                    <div class="input-group">
                    <input  name="name" type="text" id="search-product" class="form-control bg-light border-0 small" placeholder="Tìm kiếm và thêm sản phẩm vào danh mục..." aria-label="Search" aria-describedby="basic-addon2" name="search-product" onChange="">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="">
                        <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                    </div>
                </form>
                <div id="results">

                </div>
            </div>
        </div>
    </div>
    
</div>
<script>
    function addProductToCollection( productId){
            $.ajax({
                url: "dashboard/collection/addProductToCollection",
                method: "POST",
                data: {collectionId: <?= $collection['id'] ?>, productId: productId},
                error: function(err){
                    console.log("Lỗi thêm sản phẩm", err);
                },
                success: function(data) {
                    if(data == 'success'){
                        Swal.fire({
                        icon: "success",
                        title: "Thêm sản phẩm vào danh mục thành công!",
                        showConfirmButton: false,
                        timer: 2000
                        });
                        let query = $('#search-product').val();
                        findProductByName(query);
                      
                       
                    }
                }
            });
        }
    function findProductByName(name){
        // console.log(name);
        $.ajax({
            
            url: "dashboard/collection/findProductByName",
            method: "POST",
            dataType: 'json',  // Yêu cầu dữ liệu trả về dưới dạng JSON
            data: {
                query: name, 
                collectionId: <?= $collection['id'] ?>
            },
            error: function(err){
                console.log("Lỗi tìm kiếm sản phẩm", err);
            },
            success: function(products) {
                console.log("check", products);
                $('#results').empty();
                $('#results').html(() => {
                    if(products.length > 0){
                        return (`<table class="table table-bordered table-striped"  width="100%" cellspacing="0"> 
                                <thead>
                                    <tr>
                                    <th scope="col">Mã sản phẩm</th>
                                    <th scopt="col">Tên sản phẩm</th>
                                    <th scope="col">Hình ảnh </th>
                                    <th scope="col">Giá thành</th>
                                    <th scope="col">Số lượng</th>
                                    <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    ${products.map(product => (
                                        `<tr>
                                            <td>${product.id}</td>
                                            <td>${product.name}</td>
                                            <td><img src="${product.image1}" width="100" alt="${product.name}"></td>
                                            <td>${product.price}</td>
                                            <td>${product.stock}</td>
                                            <?= $collection['id'] ?>
                                            <td> 
                                            <button type="button" onclick="addProductToCollection( ${product.id})" class="btn btn-primary float-right">Thêm sản phẩm</button>
                                            </td>

                                        
                                        </tr>`)
                                    ).join(' ')}
                                </tbody>
                            </table>`)
                        }
                        else{
                            return `<p>Không tìm thấy sản phẩm nào phù hợp với từ khóa ${name} </p>`;
                        }       
                    }
                );
                
            }
        });
    }
    $(document).ready(function(){
       
        $('#search-product').on('input', function() {
            let query = $(this).val();
            // setTimeout(() => {
                if (query !== '') {
                    findProductByName(query);
                } else {
                    $('#results').empty();
                }
            // }, 1000)
        });

     
    });
</script>
