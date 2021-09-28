<div>
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col py-4 md:flex-row">

            <x-entry.notice :country="entryCountry($country)" />

            <x-entry.form wire:submit.prevent="submitEntry">

                <input wire:model="editing.country" type="text" name="country" id="country" hidden />

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

                <x-input.group wire:model.lazy="editing.entry_fee" label="Entry Fee Ref"
                    :error="$errors->first('editing.entry_fee')" placeholder="02#4567" />

                <x-input.select wire:model.lazy="editing.entry_type" id="entry-type" label="Entry Type"
                    :error="$errors->first('editing.entry_type')">
                    <option class="text-base" value="" disabled>Select Entry Type</option>
                    @foreach (entryCategories() as $category => $name)
                        <option class="text-base" value="{{ $category }}">{{ $name[0] }}</option>
                    @endforeach
                </x-input.select>

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

                <x-entry.switch wire:click.prevent="switchCountry('{{ $country }}')" :country="$country"
                    target="switchCountry" />

                <x-alert class="absolute left-0 bottom-1 w-full px-1 py-2" />

            </x-entry.form>

        </div>
    </div>
</div>
