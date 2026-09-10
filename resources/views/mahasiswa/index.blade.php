<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- TOMBOL TAMBAH MAHASISWA --}}
                <a href="{{ route('mahasiswa.create') }}"
                   style="display:inline-block; margin-bottom:16px; padding:10px 16px; background:#2563eb; color:white; text-decoration:none; border-radius:6px;">
                    + Tambah Mahasiswa
                </a>

                <div style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse; border:1px solid #d1d5db;">
                        <thead>
                            <tr style="background:#f3f4f6;">
                                <th style="border:1px solid #d1d5db; padding:8px; text-align:left;">No</th>
                                <th style="border:1px solid #d1d5db; padding:8px; text-align:left;">NIM</th>
                                <th style="border:1px solid #d1d5db; padding:8px; text-align:left;">Nama</th>
                                <th style="border:1px solid #d1d5db; padding:8px; text-align:left;">Jenis Kelamin</th>
                                <th style="border:1px solid #d1d5db; padding:8px; text-align:left;">Program Studi</th>
                                <th style="border:1px solid #d1d5db; padding:8px; text-align:left;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswas as $index => $m)
                                <tr>
                                    <td style="border:1px solid #d1d5db; padding:8px;">
                                        {{ $mahasiswas->firstItem() + $index }}
                                    </td>
                                    <td style="border:1px solid #d1d5db; padding:8px;">{{ $m->nim }}</td>
                                    <td style="border:1px solid #d1d5db; padding:8px;">{{ $m->nama_mahasiswa }}</td>
                                    <td style="border:1px solid #d1d5db; padding:8px;">{{ $m->jenis_kelamin }}</td>
                                    <td style="border:1px solid #d1d5db; padding:8px;">{{ $m->program_studi }}</td>
                                    <td style="border:1px solid #d1d5db; padding:8px; white-space:nowrap;">
                                        <a href="{{ route('mahasiswa.edit', $m) }}"
                                           style="color:#2563eb; text-decoration:none;">Edit</a>

                                        <form action="{{ route('mahasiswa.destroy', $m) }}"
                                              method="POST" style="display:inline;"
                                              onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    style="color:#dc2626; background:none; border:none; cursor:pointer; margin-left:8px;">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="border:1px solid #d1d5db; padding:16px; text-align:center; color:#6b7280;">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div style="margin-top:16px;">
                    {{ $mahasiswas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>