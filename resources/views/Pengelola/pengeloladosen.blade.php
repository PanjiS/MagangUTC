
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

    <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
    <script type="text/javascript" src="/js/commonui.js"></script>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery.dropdownPlain.js"></script>

    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="{{url('')}}/dataTables/datatables.min.js"></script>
    <script src="/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/behavior.js"></script>

    <!-- <script src="{{url('')}}//code.jquery.com/jquery-1.11.3.min.js"></script> -->
    <link href="{{url('')}}/css/bootstrap-sortable.css" rel="stylesheet" type="text/css">
    <script src="{{url('')}}/js/bootstrap-sortable.js"></script>


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
              <li><a href="{{ url('/prodi/pbiprodi') }}">Pendidikan bahasa Inggris</a></li>
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
  <h2 style="text-align:center">Daftar Rekap Dosen Mata Kuliah</h2>
  <br>
  <div class="row">
    <form action="{{url('')}}/pengelola/pengeloladosen" method="GET">
      <div class="col-md-2">Tahun Akademik</div>
        <div class="form-group col-md-2">
          <select name="thnsm" data-column="1" class="form-control input-sm dynamic" data-dependent="state" onchange="this.form.submit()">
            <option value="">Pilih Semester</option>
            @foreach($termyears as $trmy)
            <option value="{{$trmy->TermYear_Id}}" <?php if($thnsm==$trmy->TermYear_Id){echo'selected';}?> >{{$trmy->TermYear_Name}}</option>
            @endforeach

          </select>
        </div>

        <div class="col-md-1">Prodi</div>
          <div class="form-group col-md-2">
            <select name="dpt" data-column="1" class="form-control input-sm dynamic" data-dependent="state" onchange="this.form.submit()">
              <option value="">Pilih Prodi</option>
              @foreach($departments as $dprt)
              <option value="{{$dprt->Department_Id}}" <?php if($dpt==$dprt->Department_Id){echo'selected';}?> >{{$dprt->departement_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

  
        
        <table class="table sortable" id="customers">
          <thead class="thead-white">
            <tr>
              <th scope="co1"  style='text-align:center'>No</th>
              <th scope="co1"  style='text-align:center'>Department Id</th>
              <th scope="co1"  style='text-align:center' >Id Dosen</th>
              <th scope="co1"  style='text-align:center' data-defaultsign="AZ">Nama</th>
              <th scope="co1"  style='text-align:center'>Tahun Ajaran</th>
              <th scope="co1"  style='text-align:center'>Mata Kuliah</th>
              <th scope="co1" style='text-align:center'>Status</th>
              <th scope="co1"  style='text-align:center'>Mean</th>
              <th scope="co1"  style='text-align:center'>nFailed</th>
              <th scope="co1"  style='text-align:center'>nBorderline</th>
              <th scope="co1"  style='text-align:center'>nStudents</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $png)
            <tr>
              <th scope="row" style='text-align:center'>{{$loop->iteration}}</th>
              <td  style='text-align:center'>{{$png['Department_Id']}}</td>
              <td style='text-align:center'>{{$png['Lecture_Id']}}</td>
              <td>{{$png['Lecture_Name']}}</td>
              <td style='text-align:center'>{{$png['TermYear_Name']}}</td>
              <td style='text-align:center'>{{$png['Course_Id']}}</td>
              <td style="color:{{$png['Status']}}">{{$png['Status']}}</td>
              <td style='text-align:center'>{{$png['Mean_IPK']}}</td>
              <td style='text-align:center'>{{$png['nFailed']}}</td>
              <td style='text-align:center'>{{$png['nBorderline']}}</td>
              <td style='text-align:center'>{{$png['nStudents']}}</td>
             
            </tr>
            @endforeach
          </tbody>
        </table>
        
        <div class="d-flex justify-content-right">
          {!! $pengelola->appends(request()->query())->links() !!}
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
<!-- <script>
  $(document).ready(function () {
  $('#customers').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script> -->
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;table = document.getElementById("customers");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

  </body>
</html>