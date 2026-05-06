  @extends ('admin.header')
  @section('content')

<!-- MAIN -->
<div class="main-content" id="main">

  <!-- NAVBAR -->
  <div class="navbar d-flex justify-content-between">
    <button class="btn btn-light" onclick="toggleSidebar()">
      <i class="bi bi-list"></i>
    </button>
    <h5 class="mb-0">Dashboard</h5>
  </div>

  <!-- CARDS -->
  <div class="row mt-4">
    <div class="col-md-3">
      <div class="card card-primary p-3">
        <h6>Total User</h6>
        <h3>150</h3>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card card-success p-3">
        <h6>Total Driver</h6>
        <h3>80</h3>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card card-warning p-3">
        <h6>Total Pesanan</h6>
        <h3>320</h3>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card card-danger p-3">
        <h6>Pesanan Hari ini</h6>
        <h3>Rp 25JT</h3>
      </div>
    </div>
  </div>

  <!-- TABLE -->
  <div class="card mt-4">
    <div class="card-header">
      Data Terbaru
    </div>
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Putri</td>
            <td>putri@mail.com</td>
            <td><span class="badge bg-success">Aktif</span></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Budi</td>
            <td>budi@mail.com</td>
            <td><span class="badge bg-danger">Nonaktif</span></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Sinta</td>
            <td>sinta@mail.com</td>
            <td><span class="badge bg-success">Aktif</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>

<style>
    /* CARD */
.card {
  border: none;
  border-radius: var(--radius);
  box-shadow: 0 6px 18px rgba(0,0,0,0.06);
  transition: var(--transition);
}

.card:hover {
  transform: translateY(-5px);
}

.card-primary { background: var(--primary); color: white; }
.card-success { background: var(--success); color: white; }
.card-warning { background: var(--warning); color: white; }
.card-danger { background: var(--danger); color: white; }

/* TABLE */
.table thead {
  background: var(--primary);
  color: white;
}

.table tbody tr:hover {
  background: rgba(0,0,0,0.03);
}
</style>
 @endsection ('admin.footer')
