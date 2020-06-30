<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    <link href="css/laravel.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    {{-- <link href="css/gwent.css" rel="stylesheet"> --}}


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <div id="app">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->

        <div class="container mt-3 vh-100 ">
            <div class="row ">
                <div class="col-md-6">
                    <h2>Create Post</h2>
                    <form action="" @submit.prevent="postSubmit()">
                        <div class="form-group">
                            <label for="postTitle">Title</label>
                            <input class="form-control" type="text" name="postTitle" id="postTitle" v-model="postTitle">
                        </div>
                        <div class="form-group">
                            <label for="postContent">Content</label>
                            <textarea class="form-control" name="postContent" id="postContent" rows="6" v-model="postContent"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2>All Posts</h2>
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Posts</th>
                        </tr>
                        <tr v-for="post in posts">
                            <td>@{{post.title}}</td>
                            <td>@{{post.content}}</td>
                        </tr >
                    </table>
                </div>
            </div>
        </div>

        

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
            </div>
            <!-- /.container -->
        </footer>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ mix('/js/app.js') }}"></script>
    <script type="application/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="application/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    

</body>

<script>

</script>

</html>