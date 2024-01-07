
@section('content') <!-- محتوى الصفحة -->
    <div class="container-fluid">
        @include('header') <!-- إدراج الهيدر -->

        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('login.submit') }}" method="POST" class="login-form">
                            @csrf <!-- حماية النموذج -->
                            <div class="form-group">
                                <input type="text" class="form-control mb-3" placeholder="Email Address" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control mb-3" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-block">Login</button>
                            </div>
                            <div class="form-group text-center">
                                <p>Don't have an account? <a href="{{ route('register.form') }}">Register here</a></p>                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('footer') <!-- إدراج الفوتر -->
    </div>