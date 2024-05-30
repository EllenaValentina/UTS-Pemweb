<!DOCTYPE html>
<html lang="en">
@include('layouts.inc.header')
<body>
    <main id="main">

        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/')}}" url >Home</a></li>
                    <li><a href="{{ URL::curent()}}">@yield('title')</a></li>
                </ol>
            </div>
            </section>
            @yield('content')
    </main>
</body>

@include('layouts.inc.footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('layouts.inc.script')
</html>