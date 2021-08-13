<div class="mx-auto max-w-7xl">
    <div class="flex flex-col lg:flex-row">
        <div class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-gray-100">
            <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                    <div class="relative">
                        <p class="mb-2 font-medium text-gray-700 uppercase">Ghana</p>
                        <h2 class="text-5xl font-bold text-gray-900 xl:text-6xl">Contact Us</h2>
                    </div>
                    <p class="text-base text-gray-800 md:pr-16">Address: <br><span class="text-sm text-gray-600">Avery
                            Scott Complex C470 26, Abotsi Street, East
                            Legon.
                            Accra Ghana.</span> </p>
                    <p class="text-base text-gray-800 md:pr-16">Tel: <br><span
                            class="text-sm text-gray-600">+233-263-433368 <br> +233 – 543 – 807829</span> </p>
                    <a href="{{ route('welcome') }}#entry-form"
                        class="inline-block px-3 py-4 text-xl font-medium tracking-wide text-center text-white transition duration-200 bg-yellow-400 rounded-lg hover:bg-yellow-500 ease">Submit
                        An Entry</a>
                </div>
            </div>
        </div>

        <div class="w-full bg-white lg:w-6/12 xl:w-5/12">
            <form wire:submit.prevent="submitMessage"
                class="flex flex-col items-start justify-start w-full h-full p-10 lg:p-16 xl:p-24">
                <div class="relative w-full mt-6 space-y-8">
                    <div class="relative">
                        <x-alert class="absolute -bottom-6 w-full" />
                    </div>

                    <x-input.text wire:model.lazy="name" id="name" type="text" label="Name"
                        placeholder="Enter Your Name" :error="$errors->first('name')" />

                    <x-input.text wire:model.lazy="email" id="contact-email" type="email" label="Email"
                        placeholder="Enter Your Email Address" :error="$errors->first('email')" />

                    <x-input.textarea-two wire:model.lazy="message" id="message" type="textarea" label="Message"
                        placeholder="Enter Your Message" :error="$errors->first('message')" />

                    <div class="relative">
                        <button type="submit"
                            class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-yellow-400 rounded-lg hover:bg-yellow-500 ease">Send
                            Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
