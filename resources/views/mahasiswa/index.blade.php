<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Mahasiswa') }}
        </h2>
    </x-slot>

    {{-- Load Bootstrap CDN khusus di halaman ini --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">
                    + Tambah Mahasiswa
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Program Studi</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswas as $index => $m)
                                <tr>
                                    <td>{{ $mahasiswas->firstItem() + $index }}</td>
                                    <td>{{ $m->nim }}</td>
                                    <td>{{ $m->nama_mahasiswa }}</td>
                                    <td>{{ $m->jenis_kelamin }}</td>
                                    <td>{{ $m->program_studi }}</td>
                                    <td>
                                        <a href="{{ route('mahasiswa.edit', $m) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('mahasiswa.destroy', $m) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $mahasiswas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>