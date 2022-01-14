<div>
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col py-4 md:flex-row">

            <x-entry.notice>
                <div class="py-14 px-6 text-gray-700">
                    <h3 class="text-gray-700 text-sm font-semibold">
                        For more information any assistance filling the form, reach us on:
                    </h3>
                    <dl class=" px-4 mt-8 space-y-6">
                        <dt><span class="sr-only">Phone number</span></dt>
                        <dd class="flex text-base text-yellow-900">
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-900"
                                x-description="Heroicon name: outline/phone" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <a href="tel:+233558055070" class="ml-3 text-yellow-900 font-semibold text-sm">+233 (0)
                                55-805-5070</a>
                        </dd>
                        <dt><span class="sr-only">Phone number</span></dt>
                        <dd class="flex text-base text-yellow-900">
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-900"
                                x-description="Heroicon name: outline/phone" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <a href="tel:+2349063388437" class="ml-3 text-yellow-900 font-semibold text-sm">+234 (0) 906-338-8437</a>
                        </dd>
                        <dt><span class="sr-only">Email</span></dt>
                        <dd class="flex text-base text-yellow-900">
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-900 mr-1"
                                x-description="Heroicon name: outline/mail" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <a href="mailto:info@bmywa.com" class="ml-3 text-yellow-900 font-semibold text-sm">info@bmywa.com</a>
                        </dd>
                    </dl>
                </div>
            </x-entry.notice>

            <x-entry.form wire:submit.prevent="submitEntry">

                <h3 class="mb-6 text-2xl font-semibold text-gray-700 text-center">Submit your entry</h3>

                <x-input.group wire:model.lazy="editing.firstname" type="text"
                    :error="$errors->first('editing.firstname')" placeholder="Ama" id="firstname" label="First Name" />

                <x-input.group wire:model.lazy="editing.lastname" type="text"
                    :error="$errors->first('editing.lastname')" placeholder="Kwaku" id="lastname" label="Last Name" />

                <x-input.group type="email" wire:model.lazy="editing.email" :error="$errors->first('editing.email')"
                    placeholder="AmaKwaku@gmail.com" id="email" label="Email Address" />

                <x-input.group type="phone" wire:model.lazy="editing.phone" :error="$errors->first('editing.phone')"
                    placeholder="0201234567" id="phone" label="Phone" />

                <x-input.select wire:model.lazy="editing.age" id="age" label="Age"
                    :error="$errors->first('editing.age')">
                    <option class="text-base" value="" disabled>Select Your Age</option>
                    @for ($i = 6; $i < 16; $i++)
                        <option class="text-base" value="{{ $i }}">{{ $i }} Yrs</option>
                    @endfor
                </x-input.select>


                <x-input.select-country wire:model.lazy="editing.country" id="country" label="Country"
                    :country="$editing->country" :error="$errors->first('editing.country')">
                    <option class="text-base" value="" disabled>Select your Country</option>
                    @foreach (entryCountry() as $country => $name)
                        <option class="text-base" value="{{ $country }}">{{ $name }}</option>
                    @endforeach
                </x-input.select-country>


                <x-input.select wire:model.lazy="editing.entry_type" id="entry-type" label="Entry Type"
                    :error="$errors->first('editing.entry_type')">
                    <option class="text-base" value="" disabled>Select Entry Type</option>
                    @foreach (entryCategories() as $category => $name)
                        <option class="text-base" value="{{ $category }}">{{ $name[0] }}</option>
                    @endforeach
                </x-input.select>

                <x-input.group wire:model.lazy="editing.entry_fee" label="Entry Fee Ref"
                    :error="$errors->first('editing.entry_fee')" placeholder="02#4567" />

                <div x-data="{open: @entangle('editing.country')}" class="w-full p-2 -mt-4" x-cloak>

                    <div x-show.transition.enter.duration.1000ms="open"
                        class="mx-auto text-center text-yellow-500 text-sm">

                        <template x-if="open == `gh`">
                            <p class="flex w-full space-x-2 justify-center bg-cover">
                                <img src="{{ asset('images/logos/mtn-momo.jpg') }}" alt="mtn mobile money logo"
                                    class="w-12 bg-cover rounded-sm text-xs">
                                {{-- <span class="my-auto">Kindly send 5ghc to </span> --}}
                                <span class="my-auto text-blue-500 font-semibold tracking-wider">0543807829</span>
                            </p>
                        </template>

                        <template x-if="open == `ng`">
                            <p class="flex w-full space-x-2 justify-center bg-cover">
                                <img src="{{ asset('images/logos/gtb.svg') }}" alt="GT Bank logo"
                                    class="w-8 bg-cover rounded-sm text-xs">
                                <span class="my-auto text-yellow-800">Acct: </span>
                                <span class="my-auto text-green-600 font-semibold tracking-wider">0236472335</span>
                            </p>
                        </template>

                    </div>
                </div>

                <x-input.group wire:model.lazy="editing.title" type="text" :error="$errors->first('editing.title')"
                    placeholder="How The Cow Jumped Over the Moon" id="title" label="Entry Title" />

                <x-input.textarea wire:model.lazy="editing.award_entry" id="award-entry" type="text" label="Award Entry"
                    :error="$errors->first('editing.award_entry')" />

                <div class="block">
                    <x-entry.button class="relative space-x-2">
                        <span class="text-base font-normal tracking-wide">
                            Submit
                        </span>

                        <x-icon.tail-spin wire:loading.delay.long wire:target="submitEntry"
                            class="absolute w-6 h-6 inline-block" fill="currentColor" aria-hidden="true" />
                    </x-entry.button>
                </div>

                <x-alert class="absolute left-0 bottom-1 w-full px-1 py-2" />

            </x-entry.form>

        </div>
    </div>
</div>
