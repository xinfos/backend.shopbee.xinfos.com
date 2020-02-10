@extends('layouts.auth')

@section('auth_content')
<div class="col-lg-5">
    <div class="card">
        <div class="card-header pt-4 pb-4 text-center bg-primary">
            <a href="index.html">
                <span><img src="/assets/images/logo.png" alt="" height="60"></span>
            </a>
        </div>
        
        <div class="card-body p-4">
            <div class="text-center w-75 m-auto">
                <h4 class="text-dark-50 text-center mt-0 font-weight-bold">重置密码</h4>
                <p class="mb-1">我们会将临时密码发送到指定的邮箱中，请注意查收！</p>
            </div>
            
            <form action="#">
                <div class="form-group mb-3">
                    <label for="emailaddress">邮箱</label>
                    <input class="form-control" type="email" id="emailaddress" required="" placeholder="登录使用的邮箱地址">
                </div>
                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary" type="submit">重置</button>
                </div>
            </form>
        </div> 
    </div>
    
    <div class="row mt-3">
        <div class="col-12 text-center">
            <a href="/seller/login" class="ml-1"><b>立即登录</b></a>
        </div> 
    </div>
</div>
@endsection