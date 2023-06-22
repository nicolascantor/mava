@props(['options'])

<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
   <option disabled selected>Seleccione una opción</option>
    @foreach ($options as $option)
        <option value="{{$option->id}}">{{$option->nombre}} - {{ $option->nit }}</option>
   @endforeach
</select>
