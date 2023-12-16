<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <base href="/public">
    @include('Home.homecss')
    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;

            color: rgb(42, 178, 202);


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

        .back_deg {
            background-color: black;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('Home.header')
    </div>
    @include('sweetalert::alert');

    <h1 class="post_title">Update Post</h1>
    <div class="back_deg">

        <form action="{{ url('updated_post_data', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_center">
                <label for="title">Post title</label>
                <input type="text" name="title" value="{{ $post->title }}">
            </div>
            <div class="div_center">
                <label for="description">Post description</label>
                <textarea name="description">{{ $post->description }}</textarea>
            </div>

            <div class="div_center">
                <label>old image</label>
                <img height="100px" width="150px" src="/postimage/{{ $post->image }}">
            </div>
            <div class="div_center">
                <label for="image">New image</label>
                <input type="file" name="image">
            </div>

            <div class="div_center">
                <input type="submit" class="btn btn-primary" value="submit now">
            </div>
        </form>
    </div>

    @include('Home.footer')

</body>

</html>
