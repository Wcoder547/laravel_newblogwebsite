<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style type="text/css">
        .post_deg {
            font-weight: bold;
            color: white;
            text-align: center;
            font-size: 40px;
            padding-top: 10px;

        }

        .tab_deg {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 90px;
            margin-top: 30px;

        }

        th {
            background-color: skyblue;
        }

        .pics {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            @if (session()->has('message'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                    {{ session()->get('message') }}
                </div>
            @endif

            <h1 class="post_deg">All post</h1>


            <table class="tab_deg">
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>name</th>
                    <th>post status </th>
                    <th>usertype</th>
                    <th>image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Accept post</th>
                    <th>Reject post</th>
                </tr>
                @foreach ($post as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->post_status }}</td>
                        <td>{{ $post->usertype }}</td>

                        <td>
                            <img class="pics" src="postimage/{{ $post->image }}" alt="">
                        </td>
                        <td>

                            <a href="{{ url('delete_post', $post->id) }}" class="btn btn-danger"
                                onclick="confirmation(event)" type="button">Delete</a>
                        </td>

                        <td>
                            <a href="{{ url('update_post', $post->id) }}" class="btn btn-success">Update</a>
                        </td>
                        <td>
                            <a href="{{ url('accept_post', $post->id) }}" class="btn btn-outline-secondary">Accept</a>
                        </td>
                        <td>
                            <a href="{{ url('reject_post', $post->id) }}" class="btn btn-primary">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
        @include('admin.fotter')

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
