<div class="flex flex-col justify-center items-center bg-primaryWhite drop-shadow-sm">
    <img class="w-[84px] h-[84px]" src="{{ $user['image'] }}"/>
    <img class="w-[146px] h-[24px] mb-5" src="{{ asset('/assets/testimonial-rating-45.png') }}"/>
    <p class="text-primaryBlack text-lg text-center w-[240px]">{{ $user['comment'] }}</p>
    <p class="text-[#7C8087]">{{ $user['name'] }}</p>
</div>
