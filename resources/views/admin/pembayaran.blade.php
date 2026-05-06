 @extends ('admin.header')
  @section('content')
<!-- MAIN -->
<div class="main-content" id="main">

   <div class="navbar d-flex justify-content-between">
    <button class="btn btn-light" onclick="toggleSidebar()">
      <i class="bi bi-list"></i>
    </button>
    <h5 class="mb-0">Manajemen Pembayaran</h5>
    <button class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Pembayaran</button>
  </div>
<!-- FILTER -->
    <form method="GET" action="">
        <div class="mt-3 row g-3">

            <!-- STATUS -->
            <div class="col-md-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="">-- Semua Status --</option>
                    <option value="pending">Pending</option>
                    <option value="success">Success</option>
                    <option value="cancel">Cancel</option>
                </select>
            </div>

            <!-- DARI TANGGAL -->
            <div class="col-md-3">
                <label>Dari Tanggal</label>
                <input type="date" name="from" class="form-control">
            </div>

            <!-- SAMPAI TANGGAL -->
            <div class="col-md-3">
                <label>Sampai Tanggal</label>
                <input type="date" name="to" class="form-control">
            </div>

            <!-- BUTTON -->
            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-primary w-100">Filter</button>
            </div>

        </div>
    </form>

  <div class="card mt-4">
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Pesanan</th>
            <th>User</th>
            <th>Metode</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>P001</td>
            <td>John Doe</td>
            <td>Transfer Bank</td>
            <td>Rp 10.000</td>
            <td><span class="badge bg-success">Lunas</span></td>
            <td>
              <button class="btn btn-warning btn-sm">Detail</button>
            </td>
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
