@foreach($chansons as $c)
       <a href="#" class="chanson" data-file="{{$c->fichier}}" data-pjax>{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->id}}" data-pjax>{{$c->utilisateur->name}}</a><br>
   
   @endforeach