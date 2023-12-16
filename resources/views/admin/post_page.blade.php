<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

        .div_center {
            text-align: center;
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center
        }

        label {
            display: inline-block;
            width: 200px;
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
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="post_title">Add Post</h1>

            <div>
                <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label for="title">Post title</label>
                        <input type="text" name="title">
                    </div>
                    <div class="div_center">
                        <label for="description">Post description</label>
                        <textarea name="description"></textarea>
                    </div>
                    <div class="div_center">
                        <label for="image">Add image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_center">
                        <input type="submit" class="btn btn-primary" value="submit now">
                    </div>
                </form>
            </div>

            @include('admin.fotter')
        </div>
    </div>
</body>

</html>
