<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mada Travel</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./css/all.css">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css/aos.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="./css/Style.css">

</head>

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->

    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" class="text-gray">Mada Travel</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="/Region">Région</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Paiement</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">A propos</a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('logout.action') }}">Se déconnecter</a>
                    </li>
                </ul>
            </div>
            <div class="social text-gray">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </nav>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>

    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-9">
                                  <div class="card">

                                          <form class="form-horizontal" action="/Insert_Region" method="post" enctype="multipart/form-data">
                                          @csrf
                                                <div class="card-body">
                                                      <h4 class="card-title">Ajouter une Région</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <label for="fname2" class="col-sm-2 text-end control-label col-form-label">nom</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="nom" class="form-control" id="fname2" placeholder="nom de la region"required/>
                                                        </div>
                                                        <label for="validatedCustomFile" class="col-sm-2 text-end control-label col-form-label">photo</label>
                                                        <div class="col-sm-9">
                                                                <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="validatedCustomFile"
                                                                            name="image" accept=".jpg,.jpeg,.png" required>
                                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                                            file...</label>
                                                                    </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                                <input class="btn btn-success float-end text-white" type="submit" value="ajouter"/>
                                                        </div>
                                                </div>
                                          </form>

                                  </div>
                            </div>

                    </div>

                    <div class="row el-element-overlay">
                        <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <center>
                                            <div class="col-md-5">
                                                <h3 class="card-title mb-0">Listes</h3>
                                            </div>
                                        </center>
                                    </div>
                                    <center>
                                    <div class="row" style="margin-top: 10px;margin-bottom: 20px;width: 500px">   
                                    <table class="table" border="1">
                                        <thead>
                                            <tr>
                                                <th scope="col">photo</th>
                                                <th scope="col">id</th>
                                                <th scope="col">nom</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                @foreach ($data0 as $row)
                                                <tr>
                                                    <th scope="row"><img src="{{ asset('image/' . $row->image) }}" class="rounded-circle" alt="{{$row->nom}}" width="100px"/></th>
                                                    <th scope="row">{{$row->id}}</th>
                                                    <th scope="row">{{$row->nom_region}}</th>
                                                    <th scope="row">
                                                        <div class="btn-group">
                                                            <button class="btn m-0" style="background-color:rgba(0, 255, 0, 0.3)" href="">Edit</button>
                                                            <button class="btn btn-danger m-0" style="background-color:rgba(255, 0, 0, 0.4)" href="">Delete</button>
                                                        </div>
                                                    </th>
                                                </tr>
                                                @endforeach
                                        
                                        </tbody>
                                    </table>
                                    {{ $data0->onEachSide(2)->links() }}
                                </div>  
                                    </center>
                                  
                            </div>
                        </div>
                    </div>
    </div>

    <!---------------x------------- Main Site Section ---------------x-------------->


    <!-- --------------------------- Footer ---------------------------------------- -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>About us</h2>
                <p>L'équipe de Madatravel est composé de 4 jeunes développeur.</p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                <h2>Newsletter</h2>
                <p>Stay update with our latest</p>
                <div class="form-element">
                    <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Follow us</h2>
                <p>Let us be Social</p>
                <div>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">
                Copyright ©2024 All rights reserved | made by
                <a href="www.youtube.com/c/dailytuition" target="_black">Madatravel <i class="fab fa-youtube"></i>
                    Channel</a>
            </h4>
        </div>
        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>

    <!-- -------------x------------- Footer --------------------x------------------- -->

    <!-- Jquery Library file -->
    <script src="./js/Jquery3.4.1.min.js"></script>

    <!-- --------- Owl-Carousel js ------------------->
    <script src="./js/owl.carousel.min.js"></script>

    <!-- ------------ AOS js Library  ------------------------- -->
    <script src="./js/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="./js/main.js"></script>
</body>

</html>