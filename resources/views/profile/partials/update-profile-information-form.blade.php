<section>

    <header class="mb-4">
        <h5 class="fw-semibold mb-1">Informasi Profil</h5>
        <p class="text-muted small mb-0">
            Update informasi akun Anda.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- FOTO -->
        <div class="mb-3">
            <label class="form-label">Foto Profil</label><br>

            <img
                src="{{ $user->foto ? asset('storage/' . $user->foto) : 'https://i.pravatar.cc/150' }}"
                class="rounded-circle mb-2"
                width="70"
                height="70"
                style="object-fit: cover;">

            <input type="file" name="foto" class="form-control mt-2">

            @error('foto')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- NAMA -->
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input
                name="nama"
                type="text"
                class="form-control"
                value="{{ old('nama', $user->nama) }}"
                required>
            @error('nama')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- EMAIL -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                name="email"
                type="email"
                class="form-control"
                value="{{ old('email', $user->email) }}"
                required>
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- NO HP -->
        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input
                name="no_hp"
                type="text"
                class="form-control"
                value="{{ old('no_hp', $user->no_hp) }}">
            @error('no_hp')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- BUTTON -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-success btn-sm px-4">
                Simpan
            </button>

            @if (session('status') === 'profile-updated')
            <small class="text-success">
                Data berhasil disimpan.
            </small>
            @endif
        </div>

    </form>

</section>