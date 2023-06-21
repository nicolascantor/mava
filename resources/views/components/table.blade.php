@props(['headers', 'elements'])

<table class="table-fixed">
    <thead>
        <tr>
            @foreach ($headers as $header)
            <tr>
                {{ $header }}
            </tr>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($elements as $element)
        <tr>
            @foreach ($element as $attribute)
            <td>{{ $attribute }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
