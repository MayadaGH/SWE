<div >
    <a  href="{{route('profile.index' , ['name' => $user->name])}}" style="margin:3%;">
        <img  alt="{{ $user->getNameOrEmail()}} " src="{{ $user->getImageUrl() }}" style="width:20%;">
    </a>
    <a href="{{route('profile.index' , ['name' => $user->name])}}">{{ $user->getNameOrEmail()}}</a>
</div>
