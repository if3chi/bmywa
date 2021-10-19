<div x-data="{ show: false, msg: '', infoDanger: false}" x-init="@this.on('flashalert', ($data)=>{
        show = true; msg = $data; infoDanger = ($data.type === 'danger') ? true : false; setTimeout(() => show = false, 5000);
    })" {{ $attributes }} x-cloak="">
    <div x-show.transition.duration.1000ms="show" :class="{'bg-red-50': infoDanger, 'bg-green-50': !infoDanger}"
        class="rounded-md p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Heroicon name: solid/check-circle -->
                <svg :class="{'text-red-400': infoDanger, 'text-green-400': !infoDanger}" class="h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 x-text="msg.title" :class="{'text-red-800': infoDanger, 'text-green-800': !infoDanger}"
                    class="text-sm font-medium">Title </h3>
                <div :class="{'text-red-700': infoDanger, 'text-green-700': !infoDanger}" class="mt-2 text-sm">
                    <p x-text="msg.body">Message</p>
                </div>
            </div>
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" @click="show = false"
                        :class="{'text-red-500 bg-red-50 hover:bg-red-100 focus:ring-offset-red-50 focus:ring-red-600': infoDanger, 'text-green-500 bg-green-50 hover:bg-green-100 focus:ring-offset-green-50 focus:ring-green-600': !infoDanger}"
                        class="inline-flex rounded-md p-1.5  focus:outline-none focus:ring-2 focus:ring-offset-2">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: solid/x -->
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
