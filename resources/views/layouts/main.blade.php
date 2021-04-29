<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        {{-- <link rel="stylesheet" href = " {{ URL::asset('css/bootsrap-grid2.min.css')}}"> --}}
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href=" {{ URL::asset('css/style.css')}}">
        <link rel="stylesheet" href=" {{ URL::asset('css/fl-table.css')}}">


        <!-- Fonts -->
         <link rel="stylesheet" href=" {{ URL::asset('css/fontawesome.css')}}">
        {{-- <link rel="stylesheet" href=" {{ URL::asset('css/all.css')}}"> --}}
        {{-- <link rel="stylesheet" href=" {{ URL::asset('css/fontawesome.min.css')}}"> --}}

        <!-- Sweet Alert -->
        
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header" >
                    <div>
                    <h3>Portal Fail Kes</h3>
                    </div>
                </div>

                <ul class="list-unstyled components">
                    <p>Dummy Heading</p>
                    <li>
                        <a href="{!! url('/home') !!}">Halaman Utama</a>
                        {{-- <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul> --}}
                    </li>
                    @if (getAccessStatusUser()=='yes')
                    <li>
                        
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Daftar Pengguna Baru</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="{!! url('/pengguna/senarai') !!}">Senarai Pengguna</a></li>
                            <li><a href="{!! url('/pengguna/tambah') !!}">Tambah Pengguna</a></li>

                        </ul>
                    </li>
                    @endif  
                    <li>
                        
                        <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false">Fail Kes</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu1">
                            <li><a href="{!! url('/failkes/senarai') !!}">Senarai Fail Kes</a></li>
                            <li><a href="{!! url('/failkes/tambah') !!}">Tambah Fail Kes</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#">Periksa Akses Fail</a>
                    </li>
                </ul>

               
            </nav>

            <!-- Page Content Holder -->
            <div id="content" style="width:100%; !important ">

                
                    {{-- <div  style="background-color: brown; width:1500px;"> --}}
                    
                    <div class="container-fluid">

                        <div class="navbar-header" >
                            
                            <button type="button" id="sidebarCollapse" class="navbar-btn" style="background-color: rgb(226, 221, 221);">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            
                        </div>
                        <div class="navbar-left">
                            @yield('title')
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
                            <ul class="nav navbar-nav navbar-right">
                                
                           
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    {{-- </div> --}}
                
                <div style="margin-top: 3%; margin-left: 1%;">
                @yield('content')
                </div>
            </div>
        </div>





        <!-- jQuery CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
