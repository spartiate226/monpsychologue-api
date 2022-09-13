@if ($donne['statut']=='en attente')
<p>Votre demande a ete prise en compte et est en attente de confirmation du psychologue</p>
@elseif ($donne['statut']=='accepte')
<p>Votre demande a ete confirmer par le psychologue {{$donne['psychologue']}} <br>
Lien de la consultation :<span style="background-color: green;color:white">https://monpsychologue.org/visio/monpsychologue-room-{{$code}}</span>
</p>
@elseif ($donne['statut']=='refuse')
<p>Votre demande a ete refuse par le psychologue {{$donne['psychologue']}} <br>
Justification:{{$donne['justification']}}
@endif
