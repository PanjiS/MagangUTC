
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/css/standaradmin.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/css/frameworkadmin.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/css/panel.css" media="screen">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <title>Data Analisis</title>
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
  <a href="{{ url('/home') }}">Home</a>  
  </ul>
</div>
<div class="col-md-3">
<div class="accordion">                                    
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading active" role="tab" id="headingOne">
              <h4 class="panel-title">
                 <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">                                        
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
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
<h2 style="text-align:center">Daftar Rekap IPK Mata Kuliah</h2>

  <table class="table" id="customers">
    <thead class="thead-white">
      <tr>
      <th scope="col">no</th>
          <th scope="col">Department_Id</th>
          <th scope="col">Id MataKuliah</th>
          <th scope="col">Tahun Ajaran</th>
          <th scope="col">Nilai Minimum</th>
          <th scope="col">Nilai Maximum</th>
          <th scope="col">Nilai Tengah (Median)</th>
          <th scope="col">Nilai Rata-rata (Mean)</th>
          <th scope="col">Standard Deviasi</th>
          <th scope="col">Average IPK</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pengelola as $png)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$png->Department_Id}}</td>
            <td>{{$png->Course_Id}}</td>
            <td>{{$png->TermYear_Name}}</td>
            <td>{{$png->Min}}</td>
            <td>{{$png->Max}}</td>
            <td>{{$png->Median}}</td>
            <td>{{$png->Mean}}</td>
            <td>{{$png->Standard_Deviation}}</td>
            <td>{{$png->Average_IPK}}</td>
        </tr>
      @endforeach
    </tbody>
    
  </table>
  </br>
  {{$pengelola->links()}}
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

<script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
<script type="text/javascript" src="/js/commonui.js"></script>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.dropdownPlain.js"></script>
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/tiny_mce/settings.js"></script>


<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/behavior.js"></script>


<div class="row">
      <div class="footer-copy green clearfix">
        
              <p style="text-align:center">© 2020 Universitas Muhammadiyah Yogyakarta ● Developed by Magang UTC Melinda Panji Namira</p>
         
           
       </div>
    </div>
</html>