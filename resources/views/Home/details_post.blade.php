<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <base href="/public">
    @include('Home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('Home.header')
    </div>

    <div style="text-align: center"class="col-md-3">

        <div><img style="padding:20px; " src="/postimage/{{ $post->image }}" class="services_img">
        </div>

        <h3> <b>{{ $post->title }}</b></h3>
        <h4>{{ $post->description }}</h4>


        <P>POST BY <b>{{ $post->usertype }}</b></P>


    </div>

    @include('Home.footer')

</body>

</html>
