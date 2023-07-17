<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #017bf6;
  color: white;
}
</style>
</head>
<body>

<table id="customers" >
    <tr>
      <td>
        <h2>

          <?php $image_path = '/upload/logo_smancar.png'; ?>
          <img src="{{ public_path().$image_path }}" width="200" height="150">

        </h2>
      </td>
      
      <td><h2>SMA Negeri 1 Muncar</h2>
        <p>Alamat : jl. Tapanrejo Kec. Muncar Kab. Banyuwangi</p>
        <p><b> Siswa Prestasi IPS</b></p>
     </td>
    </tr>
</table>


<table id="customers">
  <tr>
    <th width="10%">No</th>
    <th width="45%">Siswa Details</th>
    <th width="45%">Siswa Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Nama</b></td>
    <td>{{ $details[0]->nama }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Jurusan</b></td>
    <td>{{ $details[0]->jurusan}}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Status</b></td>
    <td>{{ $details[0]->status}}</td>
  </tr>
  
  
</table>
<br>
<i style="font-size: 10px; float: right;"> Print Date :  {{ date("d M Y") }}</i>

</body>
</html>


