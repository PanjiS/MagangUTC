
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
<div class="col-md-9">
  <h1 style="text-align:center">Nilai Mata Kuliah Teknik Sipil</h1>
  <br>
  <small class="help-block"></small>
  <label class="col-md-3 control-label">Tahun Akademik</label>
  <div class="form-group col-md-3">
  <select data-column="1" class="form-control input-lg dynamic" data-dependent="state">
       <option value=""> Pilih Semester</option>
        <option value="20151"> 2015/1 </option>
        <option value="20152">2015/2</option>
        <option value="20161"> 2016/1 </option>
        <option value="20162"> 2016/2 </option>
        <option value="20171"> 2017/1</option>
        <option value="20172"> 2017/2 </option>
        <option value="20181"> 2018/1 </option>
        <option value="20182"> 2018/2 </option>
        <option value="20191"> 2019/1</option>
        <option value="20192"> 2019/2 </option>
  </select>

    <small class="help-block"></small>
  </div>
  <div class="col-md-3"> 
    <button type="submit" class="btn btn-flat btn-social btn-dropbox" id="button-reg">
    <i"></i> pilih</button>
  </div>

  <div>
    <table class="table table-bordered ">
    
    </table>
  </div>

<div class="table-responsive">
  <table class="table table-bordered table-hover" id="customers">
    <thead>
      <tr>
          <th scope="col" rowspan='2'></th>
          @foreach($head as $h)
          @if(is_array($h))
          <th scope="col" colspan='3' style='text-align:center'>{{$h[0]}}</th>
          @else
          <th scope="col" rowspan='2'>{{$h}}</th>
          @endif
         @endforeach
      </tr>
      <tr>
      @foreach($head as $h)
          @if(is_array($h))
          <th scope="col">{{$h[1]}}</th>
          <th scope="col">{{$h[2]}}</th>
          <th scope="col">{{$h[3]}}</th>
          
          @endif
         @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach($data as $mhs)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            @foreach($mhs as $mh)
            <td>{{$mh}}</td>
            @endforeach
            
        </tr>
      @endforeach
    </tbody>
  </table>
  <table class="table" id="customers">
    <thead class="thead-white">
      <tr>
          <th scope="col">Min</th>
          <td>ddd</td>
          <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
      </tr>
    </thead>
    <tbody>
    
    <tr>
          <th scope="col">Max</th>
          <td>ddd</td>
          <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
      </tr>
    </tbody>
    <tbody>
    
    <tr>
          <th scope="col">Median</th>
          <td>ddd</td>
          <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
      </tr>
    </tbody>
    <tbody>
    
    <tr>
          <th scope="col">Mean</th>
          <td>ddd</td>
          <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
      </tr>
    </tbody>
    <tbody>
    
    <tr>
          <th scope="col">quartil 1</th>
          <td>ddd</td>
          <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
      </tr>
    </tbody>
    <tbody>
    <tr>
          <th scope="col">quartil 3</th>
          <td>ddd</td>
          <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
      </tr>
    </tbody>
    <tbody>
    <tr>
          <th scope="col">Standar Deviation</th>
          <td>ddd</td>
          <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
      </tr>
    </tbody>
    <tbody>
    <tr>
          <th scope="col">Average IPK</th>
          <td>ddd</td>
          <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
      </tr>
    </tbody>
  </table>
  
</div>
<div class="d-flex justify-content-right">
  {!! $mahasiswas->links() !!}
</div>
</div>

<div class="row">
  <div class="footer-copy green clearfix">
    <p style="text-align:center">© 2020 Universitas Muhammadiyah Yogyakarta ● Developed by Magang UTC Melinda Panji Namira</p>
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
<script>
    //filter Berdasarkan satuan product
    $('.filter-satuan').change(function () {
        table.column( $(this).data('column'))
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });
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