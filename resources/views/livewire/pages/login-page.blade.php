<form method="post" action="{{ route('login') }}" class="space-y-4" autocomplete="off">

    <div class="text-center">
        <h1 class="text-2xl leading-10 font-semibold tracking-tight">Log In</h1>
    </div>

    <x-input
        type="email"
        label='Email'
        :class="$errors->count() ? 'border-danger' : ''"
        name='email'
        :required="true"
        :autofocus="$errors->count() ? false : true"
        :attrs="['autocomplete' => 'new-password']"
        autocomplete="off"
        :showError="false"
    />

    <x-input
        type="password"
        label='Password'
        :class="$errors->count() ? 'border-danger' : ''"
        name='password'
        :required="true"
        :autofocus="!$errors->count()"
        :attrs="['autocomplete' => 'current-password']"
        :showError="false"
        :toggle="true"
    />

    <div class="w-full flex justify-end text-white">
        <button class="bg-primaryGreen px-4 py-2 rounded-sm" type="submit">Log in</button>
    </div>
</form>
