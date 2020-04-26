<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Merupakan sebuah platform digital yang menyatukan dan memanggil Relawan untuk ikut ambil bagian dalam gerakan sosial Sumbar Lawan Covid 19.">
        <meta name="author" content="IA UKM-ITB dan Neo-Telemetri UNAND">
        <meta name="keyword" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kebutuhan Rumah Sakit</title>
    
        <!-- start: Css -->
        <link rel="stylesheet" type="text/css" href=" {{ url('backend/asset/css/bootstrap.min.css') }}">

        <!-- plugins -->
        <link rel="stylesheet" type="text/css" href="{{ url('backend/asset/css/plugins/font-awesome.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('backend/asset/css/plugins/simple-line-icons.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('backend/asset/css/plugins/datatables.bootstrap.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('backend/asset/css/plugins/animate.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('backend/asset/css/plugins/fullcalendar.min.css') }}"/>
        <link href="{{ url('backend/asset/css/style.css') }}" rel="stylesheet">
        <!-- new plugin select2-->
        <link rel="stylesheet" type="text/css" href="{{ url('backend/asset/select/dist/css/select2.min.css') }}"/>
        <!-- end new plugin -->
        <!-- end: Css -->

        <link rel="shortcut icon" href="{{ url('backend/asset/img/emeral.png') }}">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif] -->
    </head>
    <body id="mimin" class="dashboard">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index.blade.php" class="navbar-brand"> 
                 <b>ADMIN</b>
                </a>

              <ul class="nav navbar-nav search-nav">
                <li>
                   <div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Type anywhere to <b>Search</b> </label>
                    </div>
                  </div>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>{{ Auth::user()->name }}</span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="{{ url('backend/asset/img/avatar.jpg') }}" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <!-- <li><a href="#"><span class="fa fa-user"></span> My Profile</a></li>
                     <li><a href="#"><span class="fa fa-calendar"></span> My Calendar</a></li>
                     <li role="separator" class="divider"></li> -->
                     <li class="more">
                      <ul>
                        <!-- <li><a href=""><span class="fa fa-cogs"></span></a></li>
                        <li><a href=""><span class="fa fa-lock"></span></a></li> -->
                        <li><a href=""><span class="fa fa-power-off "></span>  Log out</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <!-- <li ><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li> -->
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
          <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-bar-chart"></span> Info Data  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="rumahsakit-admin">Data Rumah Sakit</a></li>
                        <li><a href="kebutuhan-admin">Data Input Kebutuhan</a></li>
                        <li><a href="donatur-admin">Data Input Donatur</a></li>
                        <li><a href="penyedia-admin">Data Input Penyedia</a></li>
                        <li><a href="donasinya-admin">Data Donasi Kebutuhan</a></li>
                      </ul>
                    </li>
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
                </div>
            </div>
          <!-- end: Left Menu -->

          <!-- start: Content -->
          <section id="intro">
          <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                  @if(session('sukses'))
                    <div class="alert alert-success">
                      <strong>Sukses!</strong> Data berhasil ditambahkan.
                    </div>
                  @endif
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Input Penyaluran</h3>
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambahkan
                          </button>
                          <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                            IMPORT EXCEL
                          </button>
                    </div>

                    
                
                    <!-- Import Excel -->
                    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form method="post" action="/pebanding/import_excel" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">
                
                              {{ csrf_field() }}
                
                              <label>Pilih file excel</label>
                              <div class="form-group">
                                <input type="file" name="file" required="required">
                              </div>
                
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>

                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Data Tables</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-bordered">
                       <thead class="thead-light">
                        <tr>
                          <th rowspan="2">Option</th>
                          <th rowspan="2">Tanggal</th>
                          <th rowspan="2">Nama Rumah Sakit</th>
                          <th colspan="3">Masker N95</th>
                          <th colspan="3">Masker Surgical</th>
                          <th colspan="3">Sarung Tangan (gloves)</th>
                          <th colspan="3">Coverall Jumpsuit (hazmat)</th>
                          <th colspan="3">Faceshield</th>
                          <th colspan="3">Kacamata Goggles</th>
                          <th colspan="3">Boot and Shoe Cover</th>
                          <th colspan="3">Handsanitizer</th>
                          <th colspan="3">Desinfektan</th>
                          <th colspan="3">Multivitamin</th>
                          <th colspan="3">Kantong Jenazah</th>
                          <th colspan="3">HEPA Filter</th>
                        </tr>
                        <tr>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            <th>Request</th>
                            <th>Donasi</th>
                            <th>Persentase</th>
                            
                        </tr>
                    
                        <tbody style="overflow: scroll">
                      @foreach($data_pebanding as $pebanding)
                      
                      <tr>
                          <td>
                            <!--<a href="#" class="btn btn-warning btn-sm" role="button">
                              <i class="fa fa-pencil-square">Edit</i>
                            </a>-->
                            <a href="/pebanding-admin/delete/{{$pebanding->id}}" class="btn btn-danger btn-sm" role="button">
                              <i class="fa fa-times-circle">Delete</i>
                            </a>
                          </td>
                          <td> {{$pebanding -> created_at}}</td>
                          <td> {{$pebanding -> rs_2 -> nama_rs}} </td>
                          <td> {{$pebanding -> r_masker_n95}} </td>
                          <td> {{$pebanding -> d_masker_n95}} </td>
                          <td> {{$pebanding -> p_masker_n95}} % </td>
                          <td> {{$pebanding -> r_masker_surgical}} </td>
                          <td> {{$pebanding -> d_masker_surgical}} </td>
                          <td> {{$pebanding -> p_masker_surgical}} %</td>
                          <td> {{$pebanding -> r_sarung_tangan}} </td>
                          <td> {{$pebanding -> d_sarung_tangan}} </td>
                          <td> {{$pebanding -> p_sarung_tangan}} %</td>
                          <td> {{$pebanding -> r_coverall_jumpsuit}} </td>
                          <td> {{$pebanding -> d_coverall_jumpsuit}} </td>
                          <td> {{$pebanding -> p_coverall_jumpsuit}} %</td>
                          <td> {{$pebanding -> r_faceshield}} </td>
                          <td> {{$pebanding -> d_faceshield}} </td>
                          <td> {{$pebanding -> p_faceshield}} %</td>
                          <td> {{$pebanding -> r_kacamata_goggles}} </td>
                          <td> {{$pebanding -> d_kacamata_goggles}} </td>
                          <td> {{$pebanding -> p_kacamata_goggles}} %</td>
                          <td> {{$pebanding -> r_boot_and_shoe_cover}} </td>
                          <td> {{$pebanding -> d_boot_and_shoe_cover}} </td>
                          <td> {{$pebanding -> p_boot_and_shoe_cover}} %</td>
                          <td> {{$pebanding -> r_handsanitizer}} </td>
                          <td> {{$pebanding -> d_handsanitizer}} </td>
                          <td> {{$pebanding -> p_handsanitizer}} %</td>
                          <td> {{$pebanding -> r_desinfektan}} </td>
                          <td> {{$pebanding -> d_desinfektan}} </td>
                          <td> {{$pebanding -> p_desinfektan}} %</td>
                          <td> {{$pebanding -> r_multivitamin}} </td>
                          <td> {{$pebanding -> d_multivitamin}} </td>
                          <td> {{$pebanding -> p_multivitamin}} %</td>
                          <td> {{$pebanding -> r_kantong_jenazah}} </td>
                          <td> {{$pebanding -> d_kantong_jenazah}} </td>
                          <td> {{$pebanding -> p_kantong_jenazah}} %</td>
                          <td> {{$pebanding -> r_Skorlet}} </td>
                          <td> {{$pebanding -> d_Skorlet}} </td>
                          <td> {{$pebanding -> p_Skorlet}} % </td>
                          
                        </tr>
                      </tbody>
                      @endforeach
                        </table>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>
            </section>
            
          <!-- end: content -->

    
          
          
      </div>

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-bar-chart"></span>Info Data
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="rumahsakit-admin">Data Rumah Sakit</a></li>
                        <li><a href="kebutuhan-admin">Data Input Kebutuhan</a></li>
                        <li><a href="donatur-admin">Data Input Donatur</a></li>
                        <li><a href="penyedia-admin">Data Input Penyedia</a></li>
                      </ul>
                    </li>
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
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">
    <form action="/pebanding-admin/create" method="POST">
    <!-- <form action="/lensamasuk/store" method="POST"> -->
        {{csrf_field()}}
  <div class="form-group">
    <label for="rs_1_id">Rumah Sakit</label>
    <select class="select2" name="rs_1_id" multiple="multiple" style="width: 100%">

      @foreach ($rs_array as $array)
        <option value="{{$array->id}}">{{$array->nama_rs}}</option>
      @endforeach

    </select>
  </div> 

  <div>
    <label for="exampleFormControlTextarea1">Masker N95</label>
    <input name="r_masker_n95" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Masker Surgical</label>
    <input name="r_masker_surgical" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Sarung tangan (gloves)</label>
    <input name="r_sarung_tangan" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Coverall Jumpsuit (hazmat)</label>
    <input name="r_coverall_jumpsuit" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Faceshield</label>
    <input name="r_faceshield" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Kacamata Goggles</label>
    <input name="r_kacamata_goggles" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Boot and Shoe Cover</label>
    <input name="r_boot_and_shoe_cover" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Handsanitizer</label>
    <input name="r_handsanitizer" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Desinfektan</label>
    <input name="r_desinfektan" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Multivitamin</label>
    <input name="r_multivitamin" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Kantong Jenazah</label>
    <input name="r_kantong_jenazah" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Skorlet</label>
    <input name="r_Skorlet" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Masker N95</label>
    <input name="d_masker_n95" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Masker Surgical</label>
    <input name="d_masker_surgical" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Sarung tangan (gloves)</label>
    <input name="d_sarung_tangan" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Coverall Jumpsuit (hazmat)</label>
    <input name="d_coverall_jumpsuit" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Faceshield</label>
    <input name="d_faceshield" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Kacamata Goggles</label>
    <input name="d_kacamata_goggles" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Boot and Shoe Cover</label>
    <input name="d_boot_and_shoe_cover" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Handsanitizer</label>
    <input name="d_handsanitizer" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Desinfektan</label>
    <input name="d_desinfektan" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Multivitamin</label>
    <input name="d_multivitamin" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Kantong Jenazah</label>
    <input name="d_kantong_jenazah" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Skorlet</label>
    <input name="d_Skorlet" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Masker N95</label>
    <input name="p_masker_n95" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Masker Surgical</label>
    <input name="p_masker_surgical" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Sarung tangan (gloves)</label>
    <input name="p_sarung_tangan" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Coverall Jumpsuit (hazmat)</label>
    <input name="p_coverall_jumpsuit" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Faceshield</label>
    <input name="p_faceshield" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Kacamata Goggles</label>
    <input name="p_kacamata_goggles" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Boot and Shoe Cover</label>
    <input name="p_boot_and_shoe_cover" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Handsanitizer</label>
    <input name="p_handsanitizer" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Desinfektan</label>
    <input name="p_desinfektan" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Multivitamin</label>
    <input name="p_multivitamin" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Kantong Jenazah</label>
    <input name="p_kantong_jenazah" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

  <div>
    <label for="exampleFormControlTextarea1">Skorlet</label>
    <input name="p_Skorlet" class="form-control" type="number" placeholder="Default input" value="0">
  </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input class="btn btn-primary" type="submit" value="Submit">
</form>
        </div>
        </div>
    </div>
    </div>

    <style>
    .table-fixed { 
        height: 400px !important;
        overflow-y: scroll;
        overflow-x: scroll;
    }
    .table-fixed thead{
        position: sticky;
        top: 0;
    }
</style>
<!-- start: Javascript -->
<script src="{{ url('backend/asset/js/jquery.min.js')}}"></script>
<script src="{{ url('backend/asset/js/jquery.ui.min.js')}}"></script>
<script src="{{ url('backend/asset/js/bootstrap.min.js')}}"></script>
<!-- plugins -->
<script src="{{ url('backend/asset/js/plugins/moment.min.js')}}"></script>
<script src="{{ url('backend/asset/js/plugins/jquery.datatables.min.js')}}"></script>
<script src="{{ url('backend/asset/js/plugins/datatables.bootstrap.min.js')}}"></script>
<script src="{{ url('backend/asset/js/plugins/jquery.nicescroll.js')}}"></script>
<!-- custom -->
<script src="{{url('backend/asset/js/main.js')}}"></script>
<script type="text/javascript">
</script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
        $('#datatables-example').DataTable();
    } );
  </script>

    </body>
</html>
