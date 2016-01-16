@foreach($detail_subbag as $user_subbag)
	User id: {{ $user_subbag->id_user }}</br>
	Nama User: {{ $user_subbag->ke_user->nama }}</br>
	email : {{ $user_subbag->ke_user->email}}</br>
@endforeach
