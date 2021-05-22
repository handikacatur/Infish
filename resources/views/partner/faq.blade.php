<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ - Frerquently Asked Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full my-4">
                        <div x-data={show:false} class="rounded-sm">
                            <div class="border border-b-0 bg-gray-100 px-10 py-6" id="headingOne">
                                <button @click="show=!show" class="underline text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                                    Apa itu Infish?
                                </button>
                            </div>
                            <div x-show="show" class="border border-b-0 px-10 py-6">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae exercitationem est aspernatur recusandae cupiditate omnis laboriosam, ipsa iste atque laborum inventore suscipit ut unde! Quae id voluptate architecto deserunt repellendus!
                            </div>
                        </div>
                        <div x-data={show:false} class="rounded-sm">
                            <div class="border border-b-0 bg-gray-100 px-10 py-6" id="headingOne">
                                <button @click="show=!show" class="underline text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                                    Bagaimana cara kerja Infish?
                                </button>
                            </div>
                            <div x-show="show" class="px-10 py-6">     
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt id provident at, quisquam dolore necessitatibus quia nihil sapiente magnam beatae, praesentium ea eum neque assumenda a. Eos quod illo eligendi.
                            </div>
                        </div>
                        <div x-data={show:false} class="rounded-sm">
                            <div class="border bg-gray-100 px-10 py-6" id="headingOne">
                                <button @click="show=!show" class="underline text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                                    Apakah infish aman untuk investasi jangka panjang?
                                </button>
                            </div>
                            <div x-show="show" class="border px-10 py-6">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint maxime repellendus, labore tempore ullam perspiciatis esse consequuntur corporis distinctio provident voluptatem hic quidem laboriosam, modi soluta! Illo porro deleniti repellat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
