 @extends ('admin.header')
  @section('content')
<!-- MAIN -->
<div class="main-content" id="main">

   <div class="navbar d-flex justify-content-between">
    <button class="btn btn-light" onclick="toggleSidebar()">
      <i class="bi bi-list"></i>
    </button>
    <h5 class="mb-0">Rating & Feedback</h5>
    <button class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Rating & Feedback</button>
  </div>

  <div class="card mt-4">
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>User</th>
            <th>Driver</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>James Smith</td>
            <td>5</td>
            <td>Layanan yang sangat baik!</td>
            <td>2023-10-01</td>
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
