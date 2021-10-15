<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <script type="text/javascript" src="{{url('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery-3.2.1.js')}}"></script> 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <tbody>
                        <tr>
            <td>-</td>
            <td>Bobot</td>
            <?php
            $stmt2x1 = $db->prepare("select * from smart_kriteria");
            $stmt2x1->execute();
            while($row2x1 = $stmt2x1->fetch()){
            ?>
            <td><?php echo $row2x1['bobot_kriteria'] ?></td>
            <?php
            }
            ?>
            <td>-</td>
            <td>-</td>
        </tr>
        <?php
        $stmtx = $db->prepare("select * from smart_alternatif");
        $noxx = 1;
        $stmtx->execute();
        while($rowx = $stmtx->fetch()){
        ?>
        <tr>
            <td><?php echo $noxx++ ?></td>
            <td><?php echo $rowx['nama_alternatif'] ?></td>
            <?php
            $stmt3x = $db->prepare("select * from smart_kriteria");
            $stmt3x->execute();
            while($row3x = $stmt3x->fetch()){
            ?>
            <td>
                <?php
                $stmt4x = $db->prepare("select * from smart_alternatif_kriteria where id_kriteria='".$row3x['id_kriteria']."' and id_alternatif='".$rowx['id_alternatif']."'");
                $stmt4x->execute();
                while($row4x = $stmt4x->fetch()){
                    $ida = $row4x['id_alternatif'];
                    $idk = $row4x['id_kriteria'];
                    echo $kal = $row4x['nilai_alternatif_kriteria']*$row3x['bobot_kriteria'];
                    $stmt2x3 = $db->prepare("update smart_alternatif_kriteria set bobot_alternatif_kriteria=? where id_alternatif=? and id_kriteria=?");
                    $stmt2x3->bindParam(1,$kal);
                    $stmt2x3->bindParam(2,$ida);
                    $stmt2x3->bindParam(3,$idk);
                    $stmt2x3->execute();
                }
                ?>
            </td>
            <?php
            }
            ?>
            <td>
                <?php
                $stmt3x2 = $db->prepare("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='".$rowx['id_alternatif']."'");
                $stmt3x2->execute();
                $row3x2 = $stmt3x2->fetch();
                $ideas = $rowx['id_alternatif'];
                echo $hsl = $row3x2['bak'];
                if($hsl>=80){
                    $ket = "Sangat Layak";
                } else if($hsl>=60){
                    $ket = "Layak";
                } else if($hsl>=40){
                    $ket = "Dipertimbangkan";
                } else{
                    $ket = "Tidak Layak";
                }
                ?>
            </td>
            <td>
                <?php
                if($hsl>=80){
                    $ket2 = "Sangat Layak";
                } else if($hsl>=55){
                    $ket2 = "Layak";
                } else if($hsl>=35){
                    $ket2 = "Dipertimbangkan";
                } else{
                    $ket2 = "Tidak Layak";
                }
                echo $ket2;
                ?>
            </td>
        </tr>
                    </tbody>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
