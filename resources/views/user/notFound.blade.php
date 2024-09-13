<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('notFound.css')}}">
    <title>Page Not Found</title>
</head>
<body>
    <div class="container">
        <div class="error">
            <img src="{{ url('storage\images\warning.png')}}" alt="image-error">
            <p class="title-error">
                We're Sorry
            </p>
            <p class="info-error">
                We seem to have lost this page but we don’t want to lose you.
            </p>
            
            <div class="back-to-home">
                <a href="{{ route('homePage')}}">
                        BACK TO HOMEPAGE
                </a>
            </div>
        </div>

        {{-- <div class="related-post">
            <h2>Related Post</h2>
                <div class="list-related-post">
                    <div class="post">
                        <div class="picture">
                            <img src="{{ url('storage\images\a12.jpg') }}" alt="" width="200px"
                                height="200px">
                            <span class="btn-image">
                                <a href="#" style="background-color:#4dcf8f" class="btn">Active</a>
                            </span>
                        </div>
                        <h3>This is my favourite fashion that i watching</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>

                    <div class="post">
                        <div class="picture">
                            <img src="{{ url('storage\images\a12.jpg') }}" alt="" width="200px"
                                height="200px">
                            <span class="btn-image">
                                <a href="" style="background-color:#4dcf8f" class="btn">Active</a>
                            </span>
                        </div>
                        <h3>This is my favourite fashion that i watching</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>

                    <div class="post">
                        <div class="picture">
                            <img src="{{ url('storage\images\a12.jpg') }}" alt="" width="200px"
                                height="200px">
                            <span class="btn-image">
                                <a href="" style="background-color:#4dcf8f" class="btn">Active</a>
                            </span>
                        </div>
                        <h3>This is my favourite fashion that i watching</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>

                    <div class="post">
                        <div class="picture">
                            <img src="{{ url('storage\images\a12.jpg') }}" alt="" width=""
                                height="200px">
                            <span class="btn-image">
                                <a href="" style="background-color:#4dcf8f" class="btn">Active</a>
                            </span>
                        </div>
                        <h3>This is my favourite fashion that i watching</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>
                </div>

        </div> --}}

    </div>

</body>
</html>