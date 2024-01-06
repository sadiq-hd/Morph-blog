
@section('content') <!-- محتوى الصفحة -->
    <div class="container-fluid">
        @include('header') <!-- إدراج الهيدر -->

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST" class="register-form"> <!-- استخدام route('register') و POST method -->
                            @csrf <!-- حماية النموذج -->
                            <div class="form-group">
                                <input type="text" class="form-control mb-3" placeholder="Full Name" name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control mb-3" placeholder="Email Address" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control mb-3" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-block">Register</button>
                            </div>
                            <div class="form-group text-center">
                                <a href="{{ route('login.form') }}">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('footer') <!-- إدراج الفوتر -->
    </div>
