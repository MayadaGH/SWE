<div >
    <a href="{{route('profile.profile' , ['id' => $user->id])}}" style="margin:3%;">
        <img  alt="{{ $user->getNameOrEmail()}} " src="{{ $user->getImage() }}" style="width:20%;">
    </a>
    <a href="{{route('profile.profile' , ['id' => $user->id])}}">{{ $user->getNameOrEmail()}}</a>
</div>
