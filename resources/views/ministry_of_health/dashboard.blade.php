<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
         Ministry of Health: {{Auth::user()->name}}
        </div>
        <a href="{{route('logout')}}">Logout</a>
    </div>
</div>
