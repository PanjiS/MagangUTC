
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

    <link rel="stylesheet" href="/dataTables/datatables.min.css">

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
  <li> <a href="{{ url('/prodi/sipilprodi') }}">Rekap Mata Kuliah</a> </li>
    <li > <a href="{{ url('/prodi/ipksipilprodi') }}">Rekap IPK </a> </li>
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
                  <li><a href="{{ url('/pengelola') }}">Rekap Dosen Mata Kuliah</a></li>
                  <li><a href="{{ url('/pengelolamatkul') }}">Rekap IPK Mata Kuliah</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<small class="help-block"></small>
  <label class="col-md-3 control-label">Tahun Akademik</label>
  <div class="col-md-3">
  <select class="form-control">
    <option >2017</option>
    <option >2018</option>
</select>
<small class="help-block"></small>
</div>
  <div class="col-md-3"> 
 
    <button type="submit" class="btn btn-flat btn-social btn-dropbox" id="button-reg">
    <i"></i> pilih</button>

  </div>
  <div class="col-md-9">                  
                   
                            <table class="table table-bordered ">
                                <tbody>
                                </tr>
                                <tr>
                                  
                                  <td>Min</td>                                  
                                  <td><span class="badge bg-red">  </span></td>

                                  <td>Max</td>                                  
                                  <td><span class="badge bg-red">  </span></td>
                                
                                </tr>
                                <tr>
                                  
                                <td>Median</td>                            
                                  <td><span class="badge bg-red">  </span></td>
                                  <td>Mean</td>                                  
                                  <td><span class="badge bg-red">  </span></td>
                                </tr>
                                <tr>
                                <td>1st quartil</td>                                  
                                  <td><span class="badge bg-red">  </span></td>                       
                                  <td>3rd quartil</td>                                  
                                  <td><span class="badge bg-red">  </span></td>

                            
                                </tr>
                                <tr>
                               

                                  <td>Standard Deviation</td>                                  
                                  <td><span class="badge bg-red">  </span></td>
                                  <td>Average IPK</td>                                  
                                  <td><span class="badge bg-red">  </span></td>
                                </tr>
                               
                              </tbody>
                            </table>
        
                </div>

<div class="col-md-9">
  <table class="table table-bordered table-hover" id="customers">
    <thead>
      <tr>
          <th scope="col"></th>
          <th scope="col">Department Id</th>
          <th scope="col">TermYear Id</th>
          <th scope="col">Course Id</th>
          <th scope="col">Class Id</th>
          <th scope="col">Student Id</th>
          <th scope="col">Grade</th>
          <th scope="col">Weight</th>
      </tr>
    </thead>
    <tbody>
      @foreach($mahasiswas as $mhs)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$mhs->Department_Id}}</td>
            <td>{{$mhs->TermYear_Id}}</td>
            <td>{{$mhs->Course_Id}}</td>
            <td>{{$mhs->Class_Id}}</td>
            <td>{{$mhs->Student_Id}}</td>
            <td>{{$mhs->Grade}}</td>
            <td>{{$mhs->Weight}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  

  <div class="d-flex justify-content-right">
  {!! $mahasiswas->links() !!}
  </div>

</div>



           
          

<script type="text/javascript" >
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-28600692-1']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
  
</script>

<script type="text/javascript">
$(document).ready( function () {
    $('customers').DataTable();
} );
</script>

</script>
<script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
<script type="text/javascript" src="/js/commonui.js"></script>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.dropdownPlain.js"></script>
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/tiny_mce/settings.js"></script>

<script src="/dataTables/datatables.min.js"></script>
<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/behavior.js"></script>

</body>
</html>