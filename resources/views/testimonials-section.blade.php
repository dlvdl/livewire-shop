<div class="h-full font-Poppins px-4">
    <h2 class="text-center font-medium text-2xl lg:text-4xl pb-2 pt-4">Testimonials</h2>
    <p class="text-center text-[#5E6E89]">Some quotes from our happy customers</p>
    <div class="grid lg:grid-cols-3 grid-rows-[295px] mt-7 gap-6">
        <x-testimonial-card
            :user="[
                 'name' => 'Luisa',
                 'image' => '/assets/testimonial-user-image-1.png',
                 'comment' => '“I love it! No more air fresheners”'
            ]"
        />
        <x-testimonial-card
            :user="[
                 'name' => 'Edorado',
                 'image' => '/assets/testimonial-user-image-2.png',
                 'comment' => '“Raccomended for everyone”'
            ]"
        />
        <x-testimonial-card
            :user="[
                 'name' => 'Mart',
                 'image' => '/assets/testimonial-user-image-3.png',
                 'comment' => '“Looks very natural, the smell is awesome”'
            ]"
        />
    </div>
</div>
