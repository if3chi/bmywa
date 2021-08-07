<div>
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col items-center md:flex-row">

            @if ($country == 'ng')
                <x-contact.nigeria />
            @endif

            @if ($country == 'gh')
                <x-contact.ghana />
            @endif

            <x-entry.form wire:submit.prevent="submitEntry">
                @csrf

                <input wire:model="editing.country" type="text" name="country" id="country" hidden />
                <h3 class="mb-6 text-2xl font-medium text-center">Submit your entry</h3>
                <x-input.group wire:model.lazy="editing.firstname" type="text"
                    :error="$errors->first('editing.firstname')" placeholder="Ama" id="firstname" label="First Name" />
                <x-input.group wire:model.lazy="editing.lastname" type="text"
                    :error="$errors->first('editing.lastname')" placeholder="Kwaku" id="lastname" label="Last Name" />
                <x-input.group type="email" wire:model.lazy="editing.email" :error="$errors->first('editing.email')"
                    placeholder="AmaKwaku@gmail.com" id="email" label="Email Address" />
                <x-input.group type="phone" wire:model.lazy="editing.phone" :error="$errors->first('editing.phone')"
                    placeholder="0201234567" id="phone" label="Phone" />


                <x-input.select wire:model.lazy="editing.entry_type" id="entry-type" label="Entry Type"
                    :error="$errors->first('editing.entry_type')">
                    <option class="text-base" value="" disabled>Select Entry Type</option>
                    <option class="text-base" value="creative-writing">Creative Writing</option>
                    <option class="text-base" value="short-story">Short Story & Poerty</option>
                </x-input.select>

                <div class="flex mb-6 w-full flex-col relative">
                    <div class="flex">
                        <x-input.number wire:model.lazy="editing.age" id="age" min="6" max="15" label="Age"
                            placeholder="7" :error="$errors->first('editing.age')" />
                        <x-input.ref wire:model.lazy="editing.entry_fee" label="Entry Fee Ref"
                            :error="$errors->first('editing.entry_fee')" placeholder="02#4567" />
                    </div>
                </div>

                <x-input.textarea wire:model.lazy="editing.award_entry" id="award-entry" type="text" label="Award Entry"
                    :error="$errors->first('editing.award_entry')" />

                <div class="block">
                    <x-entry.button>
                        Submit
                    </x-entry.button>
                </div>
                <x-entry.switch wire:click.prevent="switchCountry('{{ $country }}')" :country="$country" />

                <x-alert />

            </x-entry.form>

        </div>
    </div>
</div>
