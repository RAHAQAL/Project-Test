<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
  <style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f6f9;
  }

  .content {
    width: 100%;
    max-width: 1200px;
    padding: 20px;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  .btn-login {
    margin-bottom: 20px;
    display: flex;
  }
  </style>
</head>

<body>
  <a href="/login" class="btn btn-secondary mr-5"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
  <div class="content mt-5">
    <div class="card">
      <div class="card-body">
        <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Category</th>
              <th>Supplier</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Note</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barang as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->category }}</td>
              <td>{{ $data->supplier }}</td>
              <td>{{ $data->stock }}</td>
              <td>Rp. {{ number_format($data->price, 0) }}</td>
              <td>{{ $data->note }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="/assets/plugins/jquery/jquery.min.js"></script>
  <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="/assets/dist/js/adminlte.min.js"></script>
  @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  $(document).ready(function() {
    $('#example1').DataTable({
      responsive: true
    });
  });
  </script>
</body>

</html>