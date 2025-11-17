{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<data>
@foreach($registro as $item)
    <item>
        <id>{{ $item->id }}</id>
        <nome>{{ $item->Nome }}</nome>
        <altura>{{ $item->Altura }}</altura>
        <fase_evolutiva>{{ $item['Fase Evolutíva'] }}</fase_evolutiva>
        <primeira_geracao>{{ $item['É da primeira geração?'] ? "true" : "false" }}</primeira_geracao>
        <geracao>{{ $item->Geração }}</geracao>
        <data_criacao>{{ $item->created_at }}</data_criacao>
    </item>
@endforeach
</data>
