@php $data = $mahasiswa ?? null; @endphp

<div class="mb-3">
    <label class="block font-medium mb-1">NIM</label>
    <input type="text" name="nim" value="{{ old('nim', $data->nim ?? '') }}"
           class="w-full border rounded p-2">
    @error('nim') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label class="block font-medium mb-1">Nama Mahasiswa</label>
    <input type="text" name="nama_mahasiswa"
           value="{{ old('nama_mahasiswa', $data->nama_mahasiswa ?? '') }}"
           class="w-full border rounded p-2">
    @error('nama_mahasiswa') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label class="block font-medium mb-1">Tempat Lahir</label>
    <input type="text" name="tempat_lahir"
           value="{{ old('tempat_lahir', $data->tempat_lahir ?? '') }}"
           class="w-full border rounded p-2">
    @error('tempat_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label class="block font-medium mb-1">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir"
           value="{{ old('tanggal_lahir', $data->tanggal_lahir ?? '') }}"
           class="w-full border rounded p-2">
    @error('tanggal_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label class="block font-medium mb-1">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="w-full border rounded p-2">
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="Laki-laki"
            {{ old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
            Laki-laki
        </option>
        <option value="Perempuan"
            {{ old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
            Perempuan
        </option>
    </select>
    @error('jenis_kelamin') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label class="block font-medium mb-1">Alamat</label>
    <textarea name="alamat" rows="3"
              class="w-full border rounded p-2">{{ old('alamat', $data->alamat ?? '') }}</textarea>
    @error('alamat') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label class="block font-medium mb-1">Program Studi</label>
    <input type="text" name="program_studi"
           value="{{ old('program_studi', $data->program_studi ?? '') }}"
           class="w-full border rounded p-2">
    @error('program_studi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label class="block font-medium mb-1">Nomor HP</label>
    <input type="text" name="nomor_hp"
           value="{{ old('nomor_hp', $data->nomor_hp ?? '') }}"
           class="w-full border rounded p-2">
    @error('nomor_hp') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label class="block font-medium mb-1">Email</label>
    <input type="email" name="email"
           value="{{ old('email', $data->email ?? '') }}"
           class="w-full border rounded p-2">
    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>