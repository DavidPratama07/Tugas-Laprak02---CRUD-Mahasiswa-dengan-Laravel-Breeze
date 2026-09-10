<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mahasiswa') }}
        </h2>
    </x-slot>

    <div style="padding: 40px 20px;">
        <div style="max-width: 700px; margin: 0 auto;">
            <div style="background: white; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">

                <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('mahasiswa._form', ['mahasiswa' => $mahasiswa])

                    <div style="margin-top: 24px; display: flex; gap: 8px;">
                        <button type="submit"
                                style="padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                            Update
                        </button>
                        <a href="{{ route('mahasiswa.index') }}"
                           style="padding: 10px 20px; background: #9ca3af; color: white; border-radius: 6px; text-decoration: none; font-weight: 500;">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>