@foreach($chansons as $c)
       <a href="#" class="chanson" data-file="{{$c->fichier}}">{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->name}}"/>{{$c->utilisateur->name}}</a><br>
   
   @endforeach