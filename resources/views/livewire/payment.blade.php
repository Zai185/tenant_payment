<form class="flex justify-center mx-auto mt-4 gap-4" x-data="imagePreview()">
    <div>
        <x-packages.card width="256px" />
    </div>
    <div class="space-y-2 rounded-lg shadow-md py-4 px-4 max-w-[448px] bg-white">
        <div class="flex gap-4 items-center">
            <label class="w-32" for="">Total Price (1M)</label>
            <x-input value="100,00" />
        </div>
        <div class="flex gap-4 items-center">

            <labe class="w-32" for="">Plan Duration</labe l>
            <x-input value="3" />
        </div>
        <div class="flex gap-4 items-center">

            <label class="w-32" for="">Payment Type</label>
            <div class="flex gap-2">

                <div>
                    <input type="radio" name="payment_type">
                    <label for="">Local</label>
                </div>
                <div>
                    <input type="radio" name="payment_type">
                    <label for="">Credit Card</label>
                </div>
            </div>
        </div>


        <div class="space-y-2 w-full">
            <div class="flex gap-4 items-center">
                <label class="w-32" for="">Account Name</label>
                <x-input value="John Wick" />
            </div>
            <div class="flex gap-4 items-center">
                <label class="w-32" for="">Account Number</label>
                <x-input value="1238 3249 2347 2903" />
            </div>
            <div class="flex h-32">
                <div class="relative w-full rounded-lg bg-blue-50 border">
                    <input type="file" class="hidden" x-ref="receiptInput" @change="previewImage($event)" accept="image/*">
                    <x-button @click="$refs.receiptInput.click()" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 m-0" x-text="imageUrl ? 'Change receipt' : 'Upload recipt'"></x-button>
                </div>
                <template x-if="imageUrl">
                    <div class="relative h-full cursor-pointer group" @click="isViewingImage = true">
                        <img :src="imageUrl" alt="" class="h-full border rounded">
                        <div class="w-full h-full bg-black/20 absolute top-0 left-0 flex items-center justify-center group-hover:opacity-100 opacity-0 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </div>
                    </div>


                </template>
            </div>
        </div>
        <x-button class="w-full" type="submit">Submit</x-button>

    </div>
    <div x-show="imageUrl && isViewingImage" class="fixed top-0 left-0 bg-gray-800/20 backdrop-blur transition w-screen h-screen z-[9999] flex items-center justify-center" @click="isViewingImage = false" :class="isViewingImage ? 'opacity-1 ' : 'opacity-0 pointer-events-none'" x-transition>
        <img :src="imageUrl" class="h-full">
    </div>


</form>

<script>
    function imagePreview() {
        return {
            imageUrl: null,
            isViewingImage: false,
            previewImage: function(event) {
                const file = event.target.files[0]
                if (file) {
                    this.imageUrl = URL.createObjectURL(file);
                } else {
                    this.imageUrl = null
                }
            }
        }
    }
</script>