<h3 class="p-2 pb-4 border-bottom mb-4 text-uppercase" style="font-size: 28px; color: #222222; font-weight:500">Hồ sơ của tôi</h3>

<form action="account/profile"  method="post">
    <div class="row mb-3">
        <div class="col col-md-6 col-sm-12">
            <label for="exampleInputEmail1"  class="form-label fw-bold" style="font-size: 15px">Họ</label>
            <span class="text-danger">*</span>
            <input type="text" name="lastname"  value="<?=$user['lastname']?>" required class="form-control" placeholder="Họ..."  >
        </div>
        <div class="col col-md-6 col-sm-12">
            <label for="exampleInputEmail1"  class="form-label fw-bold" style="font-size: 15px">Tên</label>
            <span class="text-danger">*</span>
            <input type="text" name="firstname" value="<?=$user['firstname']?>" required class="form-control" placeholder="Tên..." >
        </div>
    </div>
    <div class="mb-3 ">
        <label for="exampleInputEmail1"  class="form-label fw-bold" style="font-size: 15px">Địa chỉ email</label>
        <span class="text-danger">*</span>
        <input type="email" required class="form-control" name="email" value="<?=$user['email']?>"  placeholder="example@gmail.com...">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1"  class="form-label fw-bold" style="font-size: 15px">Số điện thoại</label>
        <span class="text-danger">*</span>
        <input type="text" name="phone" required class="form-control" value="<?=$user['phone']?>" placeholder="Số điện thoại của bạn..."  >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1"  class="form-label fw-bold" style="font-size: 15px">Địa chỉ</label>
        <span class="text-danger">*</span>
        <input type="text" name="address"  class="form-control" value="<?=$user['address']?>"  placeholder="Địa chỉ của bạn..." >
    </div>
    <div class="row">
        <div class="form-group  col-12 col-lg-6">
            <label class="form-label fw-bold" style="font-size: 15px"  for="datepicker">Ngày sinh
            </label>	
            <input 
            value="<?= $user['birthday'] !== "" ? date("d/m/Y", strtotime($user['birthday'])) : "" ?>"
            name="birthday" id="datepicker" type="text" placeholder="Chọn ngày sinh"    class="form-control picker" autocomplete="off">
            

        </div>
        <div class="col col-md-6 col-sm-12">
            <label for="disabledSelect"  class="form-label fw-bold"  style="font-size: 15px">Chọn giới tính</label>
            <span class="text-danger">*</span>
            <select id="disabledSelect" name="gender" value="<?php 
                if($user['gender'] == 'male'){
                    echo 'Nam';}
                else if($user['gender'] == 'female'){
                    echo 'Nữ';}
                else{
                    echo 'Khác';}
            ?>" class="form-select">
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
                <option value="other">Khác</option>
            </select>
        </div>
    </div>
    <div class="w-100  mt-4 d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </div>
</form>