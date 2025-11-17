{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<data>
@foreach($registro as $item)
    <item>
        <id>{{ $item->id }}</id>
        <nome>{{ $item->Nome }}</nome>
        <altura>{{ $item->Altura }}</altura>
        {{-- Atenção: Coloquei o nome da tag em minúsculas para seguir a convenção XML, e usei [] para acessar a propriedade com espaços/caracteres especiais. --}}
        <fase_evolutiva>{{ $item['Fase Evolutíva'] }}</fase_evolutiva>
        <primeira_geracao>{{ $item['É da primeira geração?'] ? "true" : "false" }}</primeira_geracao>
        <geracao>{{ $item->Geração }}</geracao>
        <data_criacao>{{ $item->created_at }}</data_criacao>
    </item>
@endforeach
</data>