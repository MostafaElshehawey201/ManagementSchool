@include('Master.Header')

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="mb-5 col-lg-8 mb-lg-0">
                <div class="form-title">
                    <h2>Have you any question?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est,
                        assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse
                        natus!</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    @if (session()->has('success'))
                        {{ session('success') }}
                    @endif
                    @if (session()->has('error'))
                        {{ session('error') }}
                    @endif
                    <form method="POST" action="{{ route('CreateNewStudent') }}" enctype="multipart/form-data">
                        @csrf
                        <p>
                            <input type="text" placeholder="اسم الطالب" name="name" id="name">
                            <input type="email" placeholder="الايميل الشخصي" name="email" id="email">
                        </p>
                        <p>
                            <input type="file" name="image" id="image">
                            <input type="tel" placeholder="رقم الهاتف الشخصي " name="phone" id="phone">
                        </p>
                        <p>
                            <select name="teacher_id" class="form-control">
                                @foreach ($Teachers as $Teacher)
                                    <option value="{{$Teacher->id}}">
                                        {{$Teacher->name}}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <select name="subject_id" class="form-control">
                                @foreach ($Departments as $Department)
                                    <option value="{{$Department->id}}">
                                        {{$Department->name}}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <input type="text" placeholder="العنوان" name="address" id="address">
                            <input type="text" placeholder="درجة العام السابق" name="degree" id="degree">
                        </p>
                        <input type="hidden" name="token" value="FsWga4&@f6aw" />
                        <p><input type="submit" value="Submit"></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Shop Address</h4>
                        <p>34/8, East Hukupara <br> Gifirtok, Sadan. <br> Country Name</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Shop Hours</h4>
                        <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: +00 111 222 3333 <br> Email: support@fruitkha.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->

@include('Master.Footer')
