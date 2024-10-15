<x-layouts.app>
    <div class="container">
        <x-mary-header title="Edit User" separator />

        <form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="POST">
            @csrf
            @if(isset($user))
            @method('PUT')
            @endif

            {{-- Input untuk Name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <x-mary-input type="text" name="name" id="name" placeholder="Enter your name"
                    :value="isset($user) ? $user->name : old('name')" class="input input-bordered w-full" required />
            </div>

            {{-- Input untuk Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <x-mary-input type="email" name="email" id="email" placeholder="Enter your email"
                    :value="isset($user) ? $user->email : old('email')" class="input input-bordered w-full" required />
            </div>
            @php
            $roles = [
            [
            'id' => 1,
            'name' => 'admin'
            ],
            [
            'id' => 2,
            'name' => 'user'
            ]
            ];
            @endphp
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <x-mary-select icon="o-user" :options="$roles" wire:model="selectedRole" />
            </div>



            {{-- Input untuk Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <x-mary-input type="password" name="password" id="password" placeholder="Enter your password"
                    class="input input-bordered w-full" :required="!isset($user)" />
            </div>

            {{-- Input untuk Password Confirmation --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <x-mary-input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Confirm your password" class="input input-bordered w-full" :required="!isset($user)" />
            </div>

            {{-- Tombol Submit --}}
            <x-mary-button type="submit" class="btn btn-primary">
                {{ isset($user) ? 'Update User' : 'Add User' }}
            </x-mary-button>
        </form>
    </div>

</x-layouts.app>