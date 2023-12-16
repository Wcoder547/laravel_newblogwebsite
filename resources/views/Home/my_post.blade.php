<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('Home.homecss')
    <style>
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: black;
        }
    </style>
</head>

<body>
    <!-- header section start -->
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="header_section">
        @include('Home.header')
        <!-- banner section start -->
    </div>

    <h1 class="post_title">MY All Posts</h1>
    <div class="row">
        @foreach ($data as $data)
            <div style="text-align: center"class="col-md-4">

                <div><img style="padding:20px; " src="/postimage/{{ $data->image }}" class="services_img">
                </div>

                <h3> <b>{{ $data->title }}</b></h3>
                {{-- <h4>{{ $data->description }}</h4> --}}


                <P>POST BY <b>{{ $data->usertype }}</b></P>

                <a href="{{ url('removepostbyuser', $data->id) }}" class="btn btn-danger"
                    onclick="confirmation(event)">Delete</a>

                <a href="{{ url('post_update_page', $data->id) }}" class="btn btn-primary">Update</a>


            </div>
        @endforeach
    </div>
    @include('Home.footer')


    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urltoredirect = ev.currentTarget.getAttribute('href');
            console.log(urltoredirect);
            swal({
                    title: "Are you sure you want to delete this..?",
                    text: "You won't be Able revert this delete",
                    icon: "warning",
                    buttons: true,
                    dangermode: true
                })


                .then((willcancel) => {
                    if (willcancel) {
                        window.location.href = urltoredirect;
                    }
                })
        }
    </script>

</body>

</html>
