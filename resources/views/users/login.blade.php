<x-layout>
    <x-card class="p-3 md:p-10 max-w-lg mx-auto mt-8">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Sign in</h2>
            <p class="mb-4">login to post jobs</p>
        </header>
    
        <form method="POST" action="/users/signin">
            @csrf
    
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="form-input" name="email" value="{{old('email')}}"/>

                @error('email')
                    <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="form-input" name="password" value="{{old('password')}}"/>

                @error('password')
                    <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
   
            <div class="mb-6">
                <button type="submit" class="form-btn">Sign in</button>
            </div>
    
            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/register" class="form-link">Sign up</a>
                </p>
            </div>
        </form>
    </x-card>    
</x-layout>