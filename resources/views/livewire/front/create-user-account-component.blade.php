<div>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form wire:submit.prevent="createUser">
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.lazy="editing.name"
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model.lazy="editing.email"
                    disabled />
            </div>

            <!-- Country -->
            <div class="mt-4">
                <x-label for="country" :value="__('Country')" />

                <x-select wire:model="editing.country" name="country" id="country" class="block mt-1 w-full" disabled>
                    <option class="text-base" value="" disabled>Select Country</option>
                    @foreach (entryCountry() as $id => $name)
                        <option class="text-base" value="{{ $id }}">
                            {{ $name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                    wire:model="editing.passwd" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" wire:model.lazy="editing.passwd_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

</div>
