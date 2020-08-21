
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/standaradmin.css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/frameworkadmin.css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/panel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/dataTables/datatables.min.css">

    <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/commonui.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/jquery.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/jquery-1.11.3.min.js"></script>

    <script type="text/javascript" src="{{url('')}}/dataTables/datatables.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/behavior.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>


    <title>Analisis Mata Kuliah</title>
</head>

<body>
<div id="header" class="header white">
    <div class="container-fluid">
        <div class="row">
               <div class="col-md-12">
                  <div class="header clearfix">
                       <div class="logo">
                           <img src="/img/logo.png" alt="logo" width="250" height="50">
                       </div>
                       <div class="title">
                           ANALISIS PENILAIAN 
                       </div>
                   </div>
               </div>               
        </div>              
    </div> 
</div>

<div class="nav">
  <ul>
  <!-- <li> <a href="{{ url('/prodi/sipilprodi') }}">Rekap Mata Kuliah</a> </li> -->
    <!-- <li > <a href="{{ url('/prodi/ipksipilprodi') }}">Rekap IPK </a> </li> -->
    <a href="{{ url('/home') }}" style='color:white;'>Home</a>    
  </ul>
</div>

<div class="col-md-3">
  <div class="accordion">                                    
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading active" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style='color:white;' class="">                                        
                    Program Studi                                         
                  <i class="glyphicon pull-right fa fa-chevron-up"></i></a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                <div class="panel-body">
                  <ul>
                  <li><a href="{{ url('/prodi/sipilprodi') }}">Teknik Sipil</a></li>
                      <li><a href="{{ url('/prodi/pbiprodi') }}">Pendidikan Bahasa Inggris</a></li>
                    
                    

                  </ul>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style='color:white;'>
                  Rekap Hasil 
                  <i class="glyphicon fa fa-chevron-down pull-right"></i></a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                <div class="panel-body">
                  <ul>
                    <li><a href="{{ url('/pengelola/pengeloladosen') }}">Rekap Dosen Mata Kuliah</a></li>
                    <li><a href="{{ url('/pengelola/pengelolamatkul') }}">Rekap IPK Mata Kuliah</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <h1 style="text-align:center">Nilai Mata Kuliah Pendidikan Bahasa Ingrris</h1>
    <br>

    <div class="row">
      <form action="{{url('')}}/prodi/sipilprodi" method="GET">
        <div class="col-md-2">
        Tahun Akademik
        </div>
        
        <div class="form-group col-md-3">
          <select name="thnsm" data-column="1" class="form-control input-sm dynamic" data-dependent="state" onchange="this.form.submit()">
            <option value="">Pilih Semester</option>
            @foreach($termyears as $trmy)
            <option value="{{$trmy->TermYear_Id}}" <?php if($thnsm==$trmy->TermYear_Id){echo'selected';}?> >{{$trmy->TermYear_Name}}</option>
            @endforeach

          </select>
        </div>

        <div class="col-md-1">Tampilkan</div>
        <div class="form-group col-md-2">
          <select name="nampil" id="" class="form-control input-sm dynamic" onchange="this.form.submit()">
            <option value="10"  <?php if($sort==10){echo'selected';}?> >10</option>
            <option value="50"  <?php if($sort==50){echo'selected';}?> >50</option>
            <option value="100" <?php if($sort==100){echo'selected';}?> >100</option>
            <option value="300" <?php if($sort==300){echo'selected';}?> >300</option>
            <option value="500" <?php if($sort==500){echo'selected';}?> >500</option>
          </select>
        </div>
      </form>
    </div>
  <br><br>
  <div class="row">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="customers">
        <thead>
        <tr>
            <th scope="col" rowspan='2'>No</th>
            @php
              $d=0;
            @endphp
            @foreach($head as $h)
              @if(is_array($h))
              <th scope="col" colspan='3' style='text-align:center;border-right:2px solid black;'>{{$h[0]}}</th>
              @else
              <th scope="col" rowspan='2'style='text-align:center;<?php if($d==2){ echo "border-right:2px solid black;";} ?>'>{{$h}}</th>
              @endif
              @php
               $d++;
              @endphp
            @endforeach
          </tr>
          <tr>
          @foreach($head as $h)
              @if(is_array($h))
              <th scope="col" style='text-align:center'>{{$h[1]}}</th>
              <th scope="col" style='text-align:center'>{{$h[2]}}</th>
              <th scope="col" style='text-align:center;border-right:2px solid black;'>{{$h[3]}}</th>
              
              @endif
            @endforeach
          </tr>
        </thead>
        <tbody>
          
          @foreach($data as $mhs)
            <tr>
                <th scope="row" style='text-align:center'>{{$loop->iteration}}</th>
                @php
                  $d=1;
                @endphp
                @foreach($mhs as $mh)
                <td style='text-align:center; <?php if($d%3==0){ echo "border-right:2px solid black;";} ?>'>{{$mh}}</td>
                @php
                  $d++;
                @endphp
                @endforeach
                
            </tr>
          @endforeach
          <tr>
            <td colspan="{{count($head)}}"></td>
            <td><span>  </span></td>
          </tr>
          <tr>
              <th scope="col" colspan="4" style='position: absolute' width="280px">Min</th>
              <td></td>
              <td></td>
              <td></td>
              @foreach($foot['min'] as $f)
                
                <td scope="col" colspan="3" style='text-align:center'>{{$f}}</td>
              
              @endforeach
          </tr>
          <tr>
              <th scope="col" colspan="4" style='position: absolute' width="280px">Max</th>
              <td></td>
              <td></td>
              <td></td>
              @foreach($foot['max'] as $f)
                
                <td scope="col" colspan="3" style='text-align:center'>{{$f}}</td>
              
              @endforeach
          </tr>
          <tr>
              <th scope="col" colspan="4" style='position: absolute' width="280px" >Median</th>
              <td></td>
              <td></td>
              <td></td>
              @foreach($foot['median'] as $f)
                
                <td scope="col" colspan="3" style='text-align:center'>{{$f}}</td>
              
              @endforeach
          </tr>
          <tr>
              <th scope="col" colspan="4" style='position: absolute' width="280px">Mean</th>
              <td></td>
              <td></td>
              <td></td>
              @foreach($foot['avg'] as $f)
                
                <td scope="col" colspan="3" style='text-align:center'>{{$f}}</td>
              
              @endforeach
          </tr>
          <tr>
              <th scope="col" colspan="4" style='position: absolute' width="280px">quartil 1</th>
              <td></td>
              <td></td>
              <td></td>
              @foreach($foot['q1'] as $f)
                
                <td scope="col" colspan="3" style='text-align:center'>{{$f}}</td>
              
              @endforeach
          </tr>
          <tr>
              <th scope="col" colspan="4" style='position: absolute' width="280px">quartil 3</th>
              <td></td>
              <td></td>
              <td></td>
              @foreach($foot['q3'] as $f)
                
                <td scope="col" colspan="3" style='text-align:center'>{{$f}}</td>
              
              @endforeach
          </tr>
          <tr>
              <th scope="col" colspan="4" style='position: absolute' width="280px" height="38px" >Standar Deviation</th>
              <td></td>
              <td></td>
              <td></td>
              @foreach($foot['stdev'] as $f)

                <td scope="col" colspan="3" style='text-align:center'>{{$f}}</td>
              
              @endforeach
          </tr>
        </tbody>
      </table>  
    </div>
  </div>

<div class="d-flex justify-content-right">
{!! $mahasiswas->appends(request()->query())->links() !!}
</div>

</div>
<div class="row">
  <div class="footer-copy green clearfix" style="width:101%">
    <p style="text-align:center">© 2020 Universitas Muhammadiyah Yogyakarta || Developed by Magang UTC Melinda Panji Namira</p>
  </div>
</div>
          

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28600692-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>


</body>
</html>