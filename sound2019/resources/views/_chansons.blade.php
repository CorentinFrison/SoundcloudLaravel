
<div id="grid2">
       @foreach($chansons as $c)
              <div class="main_chanson">
       <a href="#" class="chanson" data-file="{{$c->fichier}}" data-pjax>{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->id}}" data-pjax>{{$c->utilisateur->name}}</a><br>
              </div>
   @endforeach
</div>