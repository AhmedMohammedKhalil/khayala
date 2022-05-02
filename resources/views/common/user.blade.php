<div style="margin: 80px 0">
    <div class="row">
        <div class="single-feedback">
            @if($user->photo != null)
                <img src="{{asset('img/users/'.$user->id.'/'.$user->photo)}}" alt="image">
            @else
            <img src="{{asset('img/users/default.jpg')}}" style="width: 200px !important; height: 200px" alt="image">
            @endif

            <div class="client-info pt-3">
                <h3>{{ $user->name }}</h3>
                <span>{{ $user->email }}</span>
                <span>{{ $user->phone }}</span>

            </div>
            <p style="font-style: normal">{{ nl2br($user->address) }}</p>
        </div>
    </div>
</div>
