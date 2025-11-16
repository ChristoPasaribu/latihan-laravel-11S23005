<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold" style="color:#364fc7;">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm" style="color:#4c6ef5;">
            {{ __('Jika akun Anda dihapus, semua data akan hilang secara permanen. Pastikan Anda telah mengunduh data penting sebelum melanjutkan.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        style="background:#e03131; color:white; padding:10px 16px; border-radius:8px; font-weight:600; box-shadow:0 2px 6px rgba(0,0,0,0.1);"
    >
        {{ __('Hapus Akun') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold" style="color:#364fc7;">
                {{ __('Yakin ingin menghapus akun?') }}
            </h2>

            <p class="mt-1 text-sm" style="color:#4c6ef5;">
                {{ __('Akun dan seluruh data Anda akan dihapus permanen. Masukkan password untuk melanjutkan.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="Masukkan password"
                    style="
                        border:1px solid #d0d8ff;
                        background:#f8f9ff;
                        border-radius:8px;
                        padding:10px;
                    "
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    style="
                        padding:8px 14px;
                        border-radius:8px;
                        border:1px solid #adb5ff;
                        color:#3b5bdb;
                        background:white;
                        font-weight:500;
                    "
                >
                    {{ __('Batal') }}
                </button>

                <button
                    class="ms-3"
                    style="
                        background:#e03131;
                        color:white;
                        padding:8px 14px;
                        border-radius:8px;
                        font-weight:600;
                    "
                >
                    {{ __('Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
